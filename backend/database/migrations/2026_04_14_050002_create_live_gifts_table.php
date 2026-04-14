<?php
use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration {
    public function up() {
        Schema::create('live_gifts', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('live_session_id');
            $table->unsignedBigInteger('user_id');
            $table->string('gift_type');
            $table->boolean('is_paid')->default(false);
            $table->integer('amount')->default(1);
            $table->timestamps();
        });
    }
    public function down() {
        Schema::dropIfExists('live_gifts');
    }
};
