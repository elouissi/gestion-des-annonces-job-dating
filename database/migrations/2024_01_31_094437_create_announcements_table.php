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
        Schema::create('announcements', function (Blueprint $table) {
            $table->id();
            $table->string('title',255);
            $table->string('content');
            $table->unsignedBigInteger('user_id'); 
            $table->unsignedBigInteger('compagnie_id');


            $table->foreign('user_id')
                  ->references('id')
                  ->on('users')
                  ->onDelete('cascade')
                  ->onUpdate('cascade'); 
                           
            $table->foreign('compagnie_id')
                  ->references('id')
                  ->on('compagnies')
                  ->onDelete('cascade')
                  ->onUpdate('cascade');          
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('announcements');
    }
};
