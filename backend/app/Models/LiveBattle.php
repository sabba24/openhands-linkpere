<?php
namespace App\Models;
use Illuminate\Database\Eloquent\Model;

class LiveBattle extends Model {
    protected $fillable = [ 'live_session_id','user1_id','user2_id','winner_id','user1_score','user2_score','duration_seconds','status'];
    public function liveSession() {return $this->belongsTo(LiveSession::class,'live_session_id');}
    public function winner() {return $this->belongsTo(User::class,'winner_id');}
}
