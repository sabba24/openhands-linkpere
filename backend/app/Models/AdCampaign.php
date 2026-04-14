<?php
namespace App\Models;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
class AdCampaign extends Model {
    use HasFactory;
    protected $fillable = [
        'user_id','target_type','target_id','budget_total','budget_daily','spent_total','spent_today','impressions','clicks','status'
    ];
    public function user() { return $this->belongsTo(User::class); }
}
