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
        Schema::create('students', function (Blueprint $table) {
            $table->id();
            $table->string('student_code')->unique();
            $table->string('name');
            $table->string('email')->unique();
//            $table->string('semester');
            $table->unsignedTinyInteger('semester');
            $table->enum('status', ['active', 'inactive'])
                ->default('active');

//            $table->foreignId('user_id')
//                ->constrained()
//                ->onDelete('cascade');

            $table->foreignId('faculty_id')
            ->constrained()
            ->onDelete('cascade');
            $table->timestamps();
//            El SoftDelets permite el borrado lógico sin eliminar el registro de la BD]
            $table->softDeletes();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('students');
    }
};