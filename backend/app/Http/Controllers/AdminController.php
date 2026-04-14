<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Providers\StorageProvider;

class AdminController extends Controller
{
    public function storageProviders() {
        return response()->json([
            'current' => config('filesystems.default'),
            'available' => StorageProvider::getAvailable(),
        ]);
    }
    public function setStorageProvider(Request $request) {
        $disk = $request->input('disk');
        if (!in_array($disk, StorageProvider::getAvailable())) {
            return response()->json(['error'=>'Invalid provider'], 422);
        }
        StorageProvider::setDefault($disk);
        return response()->json(['success'=>true, 'active'=>$disk]);
    }
    public function getAlgorithmConfig() {
        $cfg = \App\Models\AlgorithmConfig::current();
        return response()->json($cfg);
    }
    public function setAlgorithmConfig(Request $request) {
        $cfg = \App\Models\AlgorithmConfig::create($request->only(['engagement_weight', 'view_boost_multiplier', 'ranking_formula']));
        return response()->json($cfg);
    }
}
