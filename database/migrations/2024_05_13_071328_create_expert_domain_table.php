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
        Schema::create('expert_domain', function (Blueprint $table) {
            $table->id('E_ID')->primary();
           // $table->string('P_ID');
            $table->string('E_Name');
            $table->string('E_Title');
            $table->string('E_Position');
            $table->string('E_Workplace');
            $table->string('E_Qualification');
            $table->string('E_Email');
            $table->string('E_Field');
            $table->string('E_Research');
            $table->string('E_Publications');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('expert_domain');
    }
};
