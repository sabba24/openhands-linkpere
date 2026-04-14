<?php
namespace App\Models;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
class AlgorithmConfig extends Model {
    use HasFactory;
    protected $fillable = [ 'engagement_weight', 'view_boost_multiplier', 'ranking_formula' ];
    public static function current() {
        return self::query()->orderByDesc('id')->first() ?? self::create([
            'engagement_weight'=>1.0,
            'view_boost_multiplier'=>1.0,
            'ranking_formula'=>'default'
        ]);
    }
}
