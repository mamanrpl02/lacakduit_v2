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
        Schema::create('categories', function (Blueprint $table) {
            $table->uuid('sys_id_r_category')->primary()->unique();
            $table->string('name');
            $table->enum('type', ['in', 'out']);
            $table->text('description')->nullable();
            $table->string('icon')->nullable();
            $table->string('color')->nullable();
            $table->uuid('r_users');

            // 2. Definisikan foreign key secara manual dan detail
            $table->foreign('r_users')
                ->references('sys_id_r_user') // Nama kolom primary key di tabel tujuan
                ->on('r_user')                // Nama tabel tujuan
                ->cascadeOnDelete();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('categories');
    }
};
