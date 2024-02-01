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
        Schema::create('applicants', function (Blueprint $table) {
            $table->id();
            $table->string('Фамилия',255);
            $table->string('Имя',255);
            $table->string('Отчество',255);
            $table->string('Образование',255);
            $table->string('Специальность',255);
            $table->date('Дата_Рождения');
            $table->string('Телефон',255);
            $table->string('Email',255);
            $table->string('Фото',255);
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('applicants');
    }
};
