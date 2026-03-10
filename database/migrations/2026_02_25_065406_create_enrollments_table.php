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
        Schema::create('enrollments', function (Blueprint $table) {
            $table->id();

            $table->date('enrollment_date');
            $table->enum('status', ['inscrito', 'retirado', 'finalizado'])
                ->default('inscrito');
            $table->decimal('final_average', 5, 2)->nullable();
            $table->foreignId('student_id')
                ->constrained()
                ->onDelete('cascade');
            $table->foreignId('course_id')
                ->constrained()
                ->onDelete('cascade');

            // Evita que un estudiante se inscriba dos veces en el mismo curso
            $table->unique(['student_id', 'course_id']);
            $table->timestamps();
            $table->softDeletes();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('enrollments');
    }
};