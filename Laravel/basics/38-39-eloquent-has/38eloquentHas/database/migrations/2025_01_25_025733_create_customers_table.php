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
        Schema::create('customers', function (Blueprint $table) {
            $table->id();
            $table->string("name");
            $table->string("email");
            $table->string("phone")->unique();
        });
        Schema::create('orders', function (Blueprint $table) {
            $table->id();
            $table->decimal("amount", 10, 2)->default(0);
            $table->unsignedBigInteger("customer_id");
            $table->foreign("customer_id")
            ->references("id")
            ->on("customers")
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
        Schema::dropIfExists('customers');
    }
};
