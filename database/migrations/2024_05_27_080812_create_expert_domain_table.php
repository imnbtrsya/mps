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
            $table->json('E_Qualification');
            $table->string('E_Photo');
            $table->string('E_CategoryExpertise');
            $table->json('E_GroupExpertise');
            $table->json('E_AreaExpertise');
            $table->json('E_ResearchTitle');
            $table->json('E_DurationStart');
            $table->json('E_DurationEnd');
            $table->json('E_Agent');
            $table->json('E_Role');
            $table->json('E_Cost');
            $table->json('E_Status');
            $table->json('E_PublicationTitle');
            $table->json('E_Authors');
            $table->json('E_PublicationDate');
            $table->json('E_Source');
            $table->json('E_Volume');
            $table->json('E_Pages');
            $table->json('E_Publisher');
            $table->json('E_Link');
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