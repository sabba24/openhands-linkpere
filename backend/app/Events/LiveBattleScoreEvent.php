<?php
namespace App\Events;
use Illuminate\Broadcasting\Channel;
use Illuminate\Broadcasting\InteractsWithSockets;
use Illuminate\Broadcasting\SerializesModels;
use Illuminate\Contracts\Broadcasting\ShouldBroadcast;
class LiveBattleScoreEvent implements ShouldBroadcast {
    use InteractsWithSockets, SerializesModels;
    public $battle_id, $user1, $user2, $user1_score, $user2_score, $status, $winner;
    public function __construct($battle_id, $user1, $user2, $user1_score, $user2_score, $status, $winner) {
        $this->battle_id = $battle_id;
        $this->user1 = $user1;
        $this->user2 = $user2;
        $this->user1_score = $user1_score;
        $this->user2_score = $user2_score;
        $this->status = $status;
        $this->winner = $winner;
    }
    public function broadcastOn() {
        return new Channel('battle.' . $this->battle_id);
    }
    public function broadcastWith() {
        return [
            'battle_id' => $this->battle_id,
            'user1' => $this->user1,
            'user2' => $this->user2,
            'user1_score' => $this->user1_score,
            'user2_score' => $this->user2_score,
            'status' => $this->status,
            'winner' => $this->winner
        ];
    }
}