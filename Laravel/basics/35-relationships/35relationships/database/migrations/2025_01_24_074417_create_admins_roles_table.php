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
        Schema::create('admins_roles', function (Blueprint $table) {
            $table->unsignedBigInteger("admin_id");
            $table->foreign("admin_id")
            ->references("adminId")
            ->on("admins");
            $table->unsignedBigInteger("role_id");
            $table->foreign("role_id")
            ->references("roleId")
            ->on("roles");
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('admins_roles');
    }
};
