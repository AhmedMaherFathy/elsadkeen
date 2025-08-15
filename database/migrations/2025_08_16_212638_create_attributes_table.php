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
        Schema::create('attributes', function (Blueprint $table) {
            $table->id();
            $table->foreignId('user_id')
                        ->constrained('nationalities')
                        ->cascadeOnDelete();
            $table->foreignId('nationality_id')
                        ->nullable()
                        ->constrained('nationalities')
                        ->nullOnDelete();
            $table->foreignId('country_id')
                        ->nullable()
                        ->constrained('countries')
                        ->nullOnDelete();
            $table->foreignId('city_id')
                        ->nullable()
                        ->constrained('cities')
                        ->nullOnDelete();
            $table->foreignId('skin_color_id')
                        ->nullable()
                        ->constrained('skin_colors')
                        ->nullOnDelete();
            $table->foreignId('qualification_id')
                        ->nullable()
                        ->constrained('qualifications')
                        ->nullOnDelete();
            $table->foreignId('financial_situation_id')
                        ->nullable()
                        ->constrained('financial_situations')
                        ->nullOnDelete();
            $table->foreignId('health_condition_id')
                        ->nullable()
                        ->constrained('health_conditions')
                        ->nullOnDelete();
            $table->foreignId('physique_id')
                        ->nullable()
                        ->constrained('physiques')
                        ->nullOnDelete();
            $table->string('marital_status'); //single ,married , divorced , widower
            $table->string('type_of_marriage');
            $table->unsignedTinyInteger('age');
            $table->unsignedTinyInteger('children_number');
            $table->unsignedTinyInteger('weight');
            $table->unsignedTinyInteger('height');
            // $table->string('skin_color');
            // $table->string('physique');
            $table->string('religious_commitment');
            $table->string('prayer');
            $table->unsignedTinyInteger('smoking')->default(0);
            $table->string('hijab')->nullable();
            // $table->string('qualification');
            // $table->string('financial_situation');  //الوضع المادى
            $table->string('job')->nullable();
            // $table->string('work_field')->nullable();
            $table->unsignedBigInteger('income');
            // $table->string('health_condition');
            $table->text('life_partner')->nullable();
            $table->text('about_me')->nullable();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('attributes');
    }
};
