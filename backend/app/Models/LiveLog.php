<?php
namespace App\Models;
use Illuminate\Database\Eloquent\Model;
class LiveLog extends Model {
    protected $fillable = [ 'live_session_id', 'type', 'data', 'created_at'];
    protected $casts = [ 'data'=>'array'];
    public function session() {return $this->belongsTo(LiveSession::class, 'live_session_id');}
}
