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
        Schema::create('countries', function (Blueprint $table) {
            $table->id();
            $table->string("country");
        });
        Schema::create('authors', function (Blueprint $table) {
            $table->id();
            $table->string("name");
            $table->string("email")->unique();
            $table->unsignedBigInteger("country_id");
            $table->foreign("country_id")
            ->references("id")
            ->on("countries")
            ->cascadeOnDelete()
            ->cascadeOnUpdate();
        });
        Schema::create('posts', function (Blueprint $table) {
            $table->id();
            $table->string("title");
            $table->string("description");
            $table->unsignedBigInteger("author_id");
            $table->foreign("author_id")
            ->references("id")
            ->on("authors")
            ->cascadeOnDelete()
            ->cascadeOnUpdate();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('countries');
    }
};
