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
        Schema::create('professional_profiles', function (Blueprint $table) {
            $table->id();
            $table->foreignId('user_id')->constrained()->onDelete('cascade');
            $table->enum('current_education_level', ['technical', 'specialist', 'bachelor', 'master', 'doctorate']);
            $table->string('educational_institution');
            $table->string('university_career');
            $table->string('degree_obtained');
            $table->text('academic_certifications')->nullable();
            $table->boolean('currently_employed')->default(false);
            $table->string('current_company')->nullable();
            $table->string('current_position')->nullable();
            $table->text('responsibilities_description')->nullable();
            $table->string('cv_path')->nullable();
            $table->string('cover_letter_path')->nullable();
            $table->string('additional_certifications_path')->nullable();
            $table->string('recommendation_letter_path')->nullable();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('professional_profiles');
    }
};
