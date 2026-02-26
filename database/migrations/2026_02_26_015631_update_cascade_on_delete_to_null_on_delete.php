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
        Schema::table('applicants', function (Blueprint $table) {
            $table->dropForeign(['current_stage_id']);
            $table->dropForeign(['current_question_id']);
            $table->dropForeign(['group_id']);
            $table->foreign('current_stage_id')->references('id')->on('stages')->nullOnDelete();
            $table->foreign('current_question_id')->references('id')->on('questions')->nullOnDelete();
            $table->foreign('group_id')->references('id')->on('groups')->nullOnDelete();
        });

        Schema::table('applicant_question_responses', function (Blueprint $table) {
            $table->dropForeign(['question_id']);
            $table->unsignedBigInteger('question_id')->nullable()->change();
            $table->foreign('question_id')->references('id')->on('questions')->nullOnDelete();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('applicants', function (Blueprint $table) {
            $table->dropForeign(['current_stage_id']);
            $table->dropForeign(['current_question_id']);
            $table->dropForeign(['group_id']);
            $table->foreign('current_stage_id')->references('id')->on('stages')->cascadeOnDelete();
            $table->foreign('current_question_id')->references('id')->on('questions')->cascadeOnDelete();
            $table->foreign('group_id')->references('id')->on('groups')->cascadeOnDelete();
        });

        Schema::table('applicant_question_responses', function (Blueprint $table) {
            $table->dropForeign(['question_id']);
            $table->unsignedBigInteger('question_id')->nullable()->change();
            $table->foreign('question_id')->references('id')->on('questions')->cascadeOnDelete();
        });
    }
};
