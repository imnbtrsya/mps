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
        Schema::create('login_details', function (Blueprint $table) {
            $table->id('LD_ID');
            $table->bigInteger('P_ID')->unsigned();
            $table->foreign('P_ID')->references('P_ID')->on('platinum');
            // $table->foreignId('M_ID')->constrained('mentor');
            // $table->foreignId('S_ID')->constrained('staff');
            $table->bigInteger('M_ID')->unsigned();
            $table->foreign('M_ID')->references('M_ID')->on('mentor');
            $table->bigInteger('S_ID')->unsigned();
            $table->foreign('S_ID')->references('S_ID')->on('staff');
            $table->string('LD_username');
            $table->string('LD_password');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('login_details');
    }
};
