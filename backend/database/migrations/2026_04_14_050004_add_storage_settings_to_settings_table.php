<?php
use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration {
    public function up() {
        Schema::table('settings', function (Blueprint $table) {
            $table->string('storage_provider')->default('local');
            $table->json('storage_provider_config')->nullable();
            $table->string('storage_active_image_provider')->nullable();
            $table->string('storage_active_video_provider')->nullable();
        });
    }
    public function down() {
        Schema::table('settings', function (Blueprint $table) {
            $table->dropColumn(['storage_provider', 'storage_provider_config', 'storage_active_image_provider', 'storage_active_video_provider']);
        });
    }
};
