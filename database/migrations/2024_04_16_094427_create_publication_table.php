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
        Schema::create('publication', function (Blueprint $table) {
            $table->id('Pb_ID')->primary();
            $table->string('P_ID');
            $table->string('Pb_type');
            $table->string('Pb_authors');
            $table->date('Pb_date');
            $table->string('Pb_DOI')->nullable();
            $table->text('Pb_abstract')->nullable();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('publication');
    }
};
