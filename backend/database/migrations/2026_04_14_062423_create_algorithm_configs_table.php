<?php
use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;
return new class extends Migration {
    public function up() {
        Schema::create('algorithm_configs', function (Blueprint $table) {
            $table->id();
            $table->float('engagement_weight')->default(1.0);
            $table->float('view_boost_multiplier')->default(1.0);
            $table->string('ranking_formula')->default('default');
            $table->timestamps();
        });
    }
    public function down() { Schema::dropIfExists('algorithm_configs'); }
};