<?php
namespace App\Http\Controllers;
use Illuminate\Http\Request;
use App\Models\AdCampaign;
class AdminAdsController extends Controller {
    public function allCampaigns() {
        return response()->json(AdCampaign::with('user')->latest()->paginate(50));
    }
    public function approve($id) {
        $ad = AdCampaign::findOrFail($id); $ad->status = 'active'; $ad->save(); return response()->json($ad);
    }
    public function reject($id) {
        $ad = AdCampaign::findOrFail($id); $ad->status = 'rejected'; $ad->save(); return response()->json($ad);
    }
    public function pause($id) {
        $ad = AdCampaign::findOrFail($id); $ad->status = 'paused'; $ad->save(); return response()->json($ad);
    }
}
