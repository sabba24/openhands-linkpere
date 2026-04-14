<?php
namespace App\Services;
use Illuminate\Support\Facades\Storage;
class StorageProviderManager {
    public static function getActiveProvider($type = 'video') {
        $config = settings();
        $provider = $config['storage_provider'] ?? 'local';
        $over = $type == 'image' ? $config['storage_active_image_provider'] : $config['storage_active_video_provider'];
        return $over ?: $provider;
    }
    public static function upload($type, $file, $dest) {
        $provider = self::getActiveProvider($type);
        Storage::disk($provider)->put($dest, $file);
        return Storage::disk($provider)->url($dest);
    }
}
