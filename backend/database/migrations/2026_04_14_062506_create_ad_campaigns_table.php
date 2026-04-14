<?php
use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;
return new class extends Migration {
    public function up() {
        Schema::create('ad_campaigns', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('user_id');
            $table->enum('target_type', ['post','live']);
            $table->unsignedBigInteger('target_id');
            $table->float('budget_total');
            $table->float('budget_daily');
            $table->float('spent_total')->default(0);
            $table->float('spent_today')->default(0);
            $table->integer('impressions')->default(0);
            $table->integer('clicks')->default(0);
            $table->enum('status',['pending','active','paused','rejected','completed'])->default('pending');
            $table->timestamps();
            $table->foreign('user_id')->references('id')->on('users')->onDelete('cascade');
        });
    }
    public function down() { Schema::dropIfExists('ad_campaigns'); }
};