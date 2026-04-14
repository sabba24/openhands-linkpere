<?php
use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration {
    public function up() {
        Schema::create('live_battles', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('live_session_id');
            $table->unsignedBigInteger('user1_id');
            $table->unsignedBigInteger('user2_id');
            $table->unsignedBigInteger('winner_id')->nullable();
            $table->integer('user1_score')->default(0);
            $table->integer('user2_score')->default(0);
            $table->integer('duration_seconds')->default(300);
            $table->string('status')->default('ongoing');
            $table->timestamps();
        });
    }
    public function down() {Schema::dropIfExists('live_battles');}
};
