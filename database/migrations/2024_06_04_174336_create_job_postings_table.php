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
        Schema::create('job_postings', function (Blueprint $table) {
            $table->id();
            $table->string('address');
            $table->string('img_link');
            $table->string('profession');
            $table->integer('pay');
            $table->integer('assignment_length')->length(10);
            $table->string('schedule');
            $table->integer('openings');
            $table->timestamp('start_date');
            $table->text('experience');
            $table->string('job_description');
            $table->text('responsibilities');
            $table->text('requirements');
            $table->text('question_1')->nullable();
            $table->text('question_2')->nullable();
            $table->text('question_3')->nullable();
            $table->integer('created_by')->length(10)->unsigned();
            $table->integer('updated_by')->length(10)->unsigned();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('job_postings');
    }
};
