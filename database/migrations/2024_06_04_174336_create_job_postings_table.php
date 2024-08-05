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
            $table->string('status');
            $table->string('location')->nullable();
            $table->text('address');
            $table->text('img_link')->nullable();
            $table->text('file_name')->nullable();
            $table->string('job_id');
            $table->string('profession');
            $table->string('pay');
            $table->string('assignment_length');
            $table->string('schedule');
            $table->integer('openings')->unsigned();
            $table->date('start_date');
            $table->text('experience');
            $table->text('job_description');
            $table->text('responsibilities');
            $table->text('requirements');
            $table->text('benefits');
            $table->string('job_title');
            $table->text('question_1')->nullable();
            $table->text('question_2')->nullable();
            $table->text('question_3')->nullable();
            $table->integer('created_by')->length(10)->unsigned();
            $table->integer('updated_by')->length(10)->unsigned()->nullable();
            $table->timestamps();
            $table->softDeletes();
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
