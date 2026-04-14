<?php
namespace App\Models;
use Illuminate\Database\Eloquent\Model;
class LiveGift extends Model {
    protected $fillable = [ 'live_session_id', 'user_id', 'gift_type', 'amount', 'is_paid', 'created_at'];
    public function session() {return $this->belongsTo(LiveSession::class, 'live_session_id');}
    public function user() { return $this->belongsTo(User::class); }
}
