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
        Schema::create('cloud_init_configs', function (Blueprint $table) {
            $table->id();
            $table->timestamps();
            $table->string('name');
            $table->jsonb('config');
            $table->jsonb('tags')->default('[]');
            $table->string('version')->nullable();
            $table->string('license')->default('Unlicensed');
            $table->string('cloud_init_version');
            $table->integer('user_id')->index();

            $table->foreign('user_id')->references('id')->on('users')->onDelete('cascade');

            $table->unique(['user_id', 'name']);
            $table->unique(['name', 'version', 'cloud_init_version']);
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('cloud_init_configs');
    }
};
