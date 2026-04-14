<?php
namespace App\Events;
use Illuminate\Broadcasting\Channel;
use Illuminate\Broadcasting\InteractsWithSockets;
use Illuminate\Broadcasting\SerializesModels;
use Illuminate\Contracts\Broadcasting\ShouldBroadcast;
class LiveGiftEvent implements ShouldBroadcast {
    use InteractsWithSockets, SerializesModels;
    public $session_id, $user, $gift, $amount;
    public function __construct($session_id, $user, $gift, $amount) {
        $this->session_id = $session_id;
        $this->user = $user;
        $this->gift = $gift;
        $this->amount = $amount;
    }
    public function broadcastOn() {
        return new Channel('live.' . $this->session_id);
    }
    public function broadcastWith() {
        return [
            'user' => $this->user,
            'gift' => $this->gift,
            'amount' => $this->amount,
            'session_id' => $this->session_id
        ];
    }
}