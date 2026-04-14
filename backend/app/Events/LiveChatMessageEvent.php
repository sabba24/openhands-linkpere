<?php
namespace App\Events;
use Illuminate\Broadcasting\Channel;
use Illuminate\Broadcasting\InteractsWithSockets;
use Illuminate\Broadcasting\PresenceChannel;
use Illuminate\Broadcasting\SerializesModels;
use Illuminate\Contracts\Broadcasting\ShouldBroadcast;
class LiveChatMessageEvent implements ShouldBroadcast {
    use InteractsWithSockets, SerializesModels;
    public $session_id, $user, $message;
    public function __construct($session_id, $user, $message) {
        $this->session_id = $session_id;
        $this->user = $user;
        $this->message = $message;
    }
    public function broadcastOn() {
        return new PresenceChannel('live.' . $this->session_id);
    }
    public function broadcastWith() {
        return [
            'user' => $this->user,
            'message' => $this->message,
            'session_id' => $this->session_id
        ];
    }
}