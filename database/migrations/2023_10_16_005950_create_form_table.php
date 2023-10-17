<?php
use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::create('forms', function (Blueprint $table) {
            $table->id();
            $table->string('username');
            $table->string('password');
            $table->string('email');
            $table->string('NIK')->default('');
            $table->string('phonenumber')->default('');            
            $table->string('image');
            $table->string('file');
            $table->string('video');
            $table->timestamps();
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('forms');
    }
};
