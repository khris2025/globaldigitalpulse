<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('minings', function (Blueprint $table) {
            $table->id();
            $table->string('name'); // Plan name
            $table->decimal('min_amount', 10, 2); // Minimum amount for the plan
            $table->decimal('max_amount', 10, 2); // Maximum amount for the plan
            $table->integer('duration'); // Duration in days
            $table->decimal('roi', 5, 2); // ROI percentage
            $table->string('Coin_img')->nullable();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('minings');
    }
};
