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
        Schema::create('posts', function (Blueprint $table) {
            $table->id();
            $table->string('name',100)->nullable()->default('Text');/*Columna tio cadena de caracteres */
            $table->biginteger('category_id')->unsigned()->nullable();
            $table->text('description')->nullable();/*campo tipo text area */
            $table->enum('state',['post','no post'])->default('no post');/*Opciones de seleccion. */
            $table->timestamps();
            
            
            $table->foreign('category_id')->references('id')->on('categories')->onDelete('cascade');
            
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('posts');
    }
};
