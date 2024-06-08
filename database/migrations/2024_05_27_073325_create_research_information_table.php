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
        Schema::create('research_information', function (Blueprint $table) {
            $table->id('RI_ID');
            $table->bigInteger('P_ID')->unsigned();
            $table->foreign('P_ID')->references('P_ID')->on('platinum')->onDelete('cascade');
            $table->string('RI_title');
            $table->string('RI_author');
            $table->string('RI_area')->nullable();
            $table->text('RI_objective')->nullable();
            $table->text('RI_methodology')->nullable();
            $table->text('RI_background')->nullable();
            $table->string('RI_timeline')->nullable();
            $table->string('RI_budget')->nullable();
            $table->text('RI_outcome')->nullable();
            $table->text('RI_abstract')->nullable();
            $table->text('RI_reference')->nullable();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('research_information');
    }
};
