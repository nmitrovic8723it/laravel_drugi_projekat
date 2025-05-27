<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateProizvodsTable extends Migration
{
    public function up()
    {
        Schema::create('proizvods', function (Blueprint $table) {
            $table->id();
            $table->string('naziv');
            $table->decimal('cena', 8, 2);
            $table->text('opis')->nullable();
            $table->string('slika')->nullable();
            $table->foreignId('kategorija_id')->constrained()->onDelete('cascade');
            $table->boolean('istaknut')->default(0);
            $table->timestamps();
        });
    }

    public function down()
    {
        Schema::dropIfExists('proizvods');
    }
}
