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
}
