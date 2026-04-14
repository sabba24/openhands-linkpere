<?php
use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration {
    public function up() {
        Schema::create('live_sessions', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('user_id');
            $table->string('cover')->nullable();
            $table->string('title')->nullable();
            $table->string('status')->default('live');
            $table->boolean('is_battle')->default(false);
            $table->unsignedBigInteger('opponent_id')->nullable();
            $table->unsignedBigInteger('winner_id')->nullable();
            $table->integer('score')->default(0);
            $table->timestamp('start_time')->nullable();
            $table->timestamp('end_time')->nullable();
            $table->integer('viewer_count')->default(0);
            $table->decimal('gift_total', 12, 2)->default(0);
            $table->json('settings')->nullable();
            $table->timestamps();
        });
    }
    public function down() {
        Schema::dropIfExists('live_sessions');
    }
};
