<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    //up() is responsible for going forward.
    public function up(): void
    {
        //laravel assumes that if you have a model called task then laravel automatically make  a table called tasks.複数形。
        //モデルは必ず単数形で記述すること
       
        Schema::create('tasks', function (Blueprint $table) {
            $table->id();
            $table->string('title');
            $table->text('description');
            $table->text('long_description')->nullable();
            $table->boolean('completed')->default(false);


            $table->timestamps(); //timestamps has two columns, created at and updated_at
        });
    }

    /**
     * Reverse the migrations.
     */
    //down() is responsible for going back.

    public function down(): void
    {//drop the table from the database
        Schema::dropIfExists('tasks');
    }
};


