<?php
use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration {
    public function up() {
        Schema::create('live_viewers', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('live_session_id');
            $table->unsignedBigInteger('user_id');
            $table->timestamp('joined_at')->nullable();
            $table->timestamp('left_at')->nullable();
            $table->timestamps();
        });
    }
    public function down() {Schema::dropIfExists('live_viewers');}
};
