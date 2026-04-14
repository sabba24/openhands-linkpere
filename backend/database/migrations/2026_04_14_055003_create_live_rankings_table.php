<?php
use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration {
    public function up() {
        Schema::create('live_rankings', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('user_id');
            $table->integer('gift_points')->default(0);
            $table->integer('battle_wins')->default(0);
            $table->integer('top_podiums')->default(0);
            $table->timestamps();
        });
    }
    public function down() {Schema::dropIfExists('live_rankings');}
};
