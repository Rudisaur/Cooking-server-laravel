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
        Schema::create('reports_ingredients', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('report_id');
            $table->unsignedBigInteger('ingredient_id');
            $table->string('name_of_ingredient')->nullable();
            $table->foreign('report_id')->references('id')->on('reports')->onDelete('cascade');
            $table->foreign('ingredient_id')->references('id')->on('ingredients');
            $table->unsignedBigInteger('sum_of_buying');
            $table->unsignedBigInteger('weigh_in_gram');
            $table->unsignedInteger('percent_of_effective');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('reports_ingredients');
    }
};
