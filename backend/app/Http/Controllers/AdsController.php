<?php
namespace App\Http\Controllers;
use Illuminate\Http\Request;
use App\Models\AdCampaign;
use Illuminate\Support\Facades\Auth;
class AdsController extends Controller {
    public function create(Request $req) {
        $ad = AdCampaign::create([
            'user_id'=>Auth::id(),
            'target_type'=>$req->target_type,
            'target_id'=>$req->target_id,
            'budget_total'=>$req->budget_total,
            'budget_daily'=>$req->budget_daily,
            'status'=>'pending'
        ]);
        return response()->json($ad);
    }
    public function campaigns() {
        return response()->json(AdCampaign::where('user_id',Auth::id())->get());
    }
    public function trackImpression($id) {
        $ad = AdCampaign::findOrFail($id);
        $ad->impressions++;
        $ad->spent_today += ($ad->budget_daily > 0) ? $ad->budget_daily / 100 : 0.05;
        $ad->spent_total += ($ad->budget_total > 0) ? $ad->budget_total / 1000 : 0.05;
        $ad->save();
        return response()->json(['ok'=>1]);
    }
    public function trackClick($id) {
        $ad = AdCampaign::findOrFail($id);
        $ad->clicks++;
        $ad->spent_today += ($ad->budget_daily > 0) ? $ad->budget_daily / 30 : 0.20;
        $ad->spent_total += ($ad->budget_total > 0) ? $ad->budget_total / 200 : 0.20;
        $ad->save();
        return response()->json(['ok'=>1]);
    }
}
