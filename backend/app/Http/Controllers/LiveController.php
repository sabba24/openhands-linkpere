<?php
namespace App\Http\Controllers;
use App\Models\LiveSession;
use App\Models\LiveGift;
use App\Models\LiveLog;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class LiveController extends Controller {
    public function start(Request $request) {
        $session = LiveSession::create([
            'user_id' => Auth::id(),
            'title' => $request->title,
            'cover' => $request->cover,
            'status' => 'live',
            'is_battle' => $request->is_battle ?? false,
            'settings' => $request->settings,
            'start_time' => now()
        ]);
        return response()->json($session);
    }
    public function join($id) {
        $session = LiveSession::findOrFail($id);
        $session->increment('viewer_count');
        return response()->json($session);
    }
    public function chat($id, Request $request) {
        $log = LiveLog::create([
            'live_session_id' => $id,
            'type' => 'chat',
            'data' => ['user_id'=>Auth::id(),'msg'=>$request->msg],
        ]);
        return response()->json($log);
    }
    public function sendGift($id, Request $request) {
        $gift = LiveGift::create([
            'live_session_id' => $id,
            'user_id' => Auth::id(),
            'gift_type' => $request->gift_type,
            'is_paid' => $request->is_paid ?? false,
            'amount' => $request->amount ?? 1
        ]);
        $session = LiveSession::findOrFail($id);
        $session->increment('gift_total', $request->amount ?? 1);
        return response()->json($gift);
    }
    public function battle($id, Request $request) {
        $session = LiveSession::findOrFail($id);
        $session->is_battle = true;
        $session->opponent_id = $request->opponent_id;
        $session->save();
        return response()->json($session);
    }
    public function finish($id, Request $request) {
        $session = LiveSession::findOrFail($id);
        $session->status = 'ended';
        $session->winner_id = $request->winner_id;
        $session->end_time = now();
        $session->save();
        return response()->json($session);
    }
    public function leaderboard() {
        $rank = LiveSession::where('status','ended')->orderByDesc('gift_total')->limit(10)->get();
        return response()->json($rank);
    }
}
