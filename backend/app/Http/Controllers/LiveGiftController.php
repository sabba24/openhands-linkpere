<?php
namespace App\Http\Controllers;
use Illuminate\Http\Request;
use App\Models\LiveGift;
use App\Models\LiveSession;
use Illuminate\Support\Facades\Auth;

class LiveGiftController extends Controller {
    public function send(Request $request) {
        $data = $request->validate([
            'live_session_id'=>'required|exists:live_sessions,id',
            'gift_type'=>'required|string',
            'amount'=>'required|integer|min:1',
            'is_paid'=>'boolean'
        ]);
        $gift = LiveGift::create([
            'live_session_id'=>$data['live_session_id'],
            'user_id'=>Auth::id(),
            'gift_type'=>$data['gift_type'],
            'is_paid'=>isset($data['is_paid'])?$data['is_paid']:false,
            'amount'=>$data['amount']
        ]);
        $session = LiveSession::find($data['live_session_id']);
        $session->increment('gift_total', $data['amount']);
        // Update leaderboard
        $ranking = \App\Models\LiveRanking::firstOrCreate([
            'user_id' => Auth::id(),
        ]);
        $ranking->gift_points += $data['amount'];
        $ranking->save();
        return response()->json($gift);
    }
    public function gifts($session_id) {
        $gifts = LiveGift::where('live_session_id',$session_id)->with('user')->get();
        return response()->json($gifts);
    }
    public function balance(Request $request) {
        $user_id = Auth::id();
        $sent = LiveGift::where('user_id',$user_id)->sum('amount');
        $received = LiveGift::whereHas('session', function($q) use ($user_id) {
            $q->where('user_id', $user_id);
        })->sum('amount');
        return response()->json(['sent'=>$sent,'received'=>$received]);
    }
    public function transactions(Request $request) {
        $user_id = Auth::id();
        $sent = LiveGift::where('user_id',$user_id)->get();
        $received = LiveGift::whereHas('session', function($q) use ($user_id) {
            $q->where('user_id', $user_id);
        })->get();
        return response()->json(['sent'=>$sent,'received'=>$received]);
    }
}
