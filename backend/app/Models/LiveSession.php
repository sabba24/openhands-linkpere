<?php
namespace App\Models;
use Illuminate\Database\Eloquent\Model;

class LiveSession extends Model
{
    protected $fillable = [
        'user_id', 'cover', 'title', 'status', 'is_battle', 'opponent_id', 'winner_id', 'score', 'start_time', 'end_time', 'viewer_count', 'gift_total', 'settings'
    ];

    protected $casts = [
        'settings' => 'array',
        'start_time' => 'datetime',
        'end_time' => 'datetime'
    ];

    public function user() { return $this->belongsTo(User::class); }
    public function opponent() { return $this->belongsTo(User::class, 'opponent_id'); }
    public function winner() { return $this->belongsTo(User::class, 'winner_id'); }
    public function gifts() { return $this->hasMany(LiveGift::class); }
    public function logs() { return $this->hasMany(LiveLog::class); }
}
