<?php
namespace App\Http\Controllers;
use Illuminate\Http\Request;
use App\Models\LiveBattle;
use Illuminate\Support\Facades\Auth;

class LiveBattleController extends Controller {
    public function start(Request $request) {
        $data = $request->validate([
            'live_session_id'=>'required|exists:live_sessions,id',
            'user1_id'=>'required|exists:users,id',
            'user2_id'=>'required|exists:users,id',
            'duration_seconds'=>'integer|min:60|max:600'
        ]);
        $battle = LiveBattle::create([
            'live_session_id'=>$data['live_session_id'],
            'user1_id'=>$data['user1_id'],
            'user2_id'=>$data['user2_id'],
            'duration_seconds'=>$data['duration_seconds'] ?? 300
        ]);
        return response()->json($battle);
    }
    public function join($battle_id) {
        $battle = LiveBattle::findOrFail($battle_id);
        return response()->json($battle);
    }
    public function score($battle_id, Request $request) {
        $battle = LiveBattle::findOrFail($battle_id);
        $score = $request->input('score');
        $user = Auth::id();
        if ($user == $battle->user1_id) $battle->user1_score += $score;
        elseif ($user == $battle->user2_id) $battle->user2_score += $score;
        $battle->save();
        return response()->json($battle);
    }
    public function end($battle_id, Request $request) {
        $battle = LiveBattle::findOrFail($battle_id);
        $winner = $request->input('winner_id');
        $battle->winner_id = $winner;
        $battle->status = 'ended';
        $battle->save();
        return response()->json($battle);
    }
    public function list(Request $request) {
        $battles = LiveBattle::with(['liveSession','winner'])->latest()->take(50)->get();
        return response()->json($battles);
    }

    public function podium(Request $request) {
        $rankings = \App\Models\LiveRanking::orderByDesc('gift_points')->limit(10)->get();
        return response()->json($rankings);
    }
}
