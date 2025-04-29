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
      Schema::create('core1_applicant_interview', function (Blueprint $table) {
          $table->id('interview_id');
          $table->string('applicant_id')->nullable();
          $table->string('interview_date')->nullable();
          $table->string('status')->nullable();
          $table->timestamps();
  //
      });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        //
    }
};
