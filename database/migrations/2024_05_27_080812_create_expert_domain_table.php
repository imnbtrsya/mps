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
            $table->string('E_Email');
            $table->string('E_Position');
            $table->string('E_Workplace');
            $table->string('E_Qualification');
            $table->string('E_Photo');
            $table->string('E_CategoryExpertise');
            $table->string('E_GroupExpertise');
            $table->string('E_AreaExpertise');
            $table->string('E_ResearchTitle');
            $table->string('E_DurationStart');
            $table->string('E_DurationEnd');
            $table->string('E_Agent');
            $table->string('E_Role');
            $table->string('E_Cost');
            $table->string('E_Status');
            $table->string('E_PublicationTitle');
            $table->string('E_Authors');
            $table->string('E_PublicationDate');
            $table->string('E_Source');
            $table->string('E_Volume');
            $table->string('E_Pages');
            $table->string('E_Publisher');
            $table->string('E_Link');
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