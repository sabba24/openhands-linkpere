<?php
namespace App\Providers;
use Illuminate\Support\Facades\Storage;
class StorageProvider {
    public static function setDefault($disk) {
        config(['filesystems.default' => $disk]);
    }
    public static function getAvailable() {
        $dsks = array_keys(config('filesystems.disks'));
        return $dsks;
    }
}
