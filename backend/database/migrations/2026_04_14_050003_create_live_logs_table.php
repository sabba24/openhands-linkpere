<?php
use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration {
    public function up() {
        Schema::create('live_logs', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('live_session_id');
            $table->string('type');
            $table->json('data')->nullable();
            $table->timestamps();
        });
    }
    public function down() {
        Schema::dropIfExists('live_logs');
    }
};
