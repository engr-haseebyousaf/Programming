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
        Schema::create('student_contacts', function (Blueprint $table) {
            $table->id("studentContactId");
            $table->string("studentEmail")->unique();
            $table->string("studentPhone")->unique();
            $table->string("studentAddress");
            $table->string("studentCity");
            $table->unsignedBigInteger("studentTableId");
            $table->foreign("studentTableId")
            ->references("studentId")
            ->on("students");
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('student_contacts');
    }
};
