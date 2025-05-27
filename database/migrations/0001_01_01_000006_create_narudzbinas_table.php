<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateNarudzbinasTable extends Migration
{
    public function up()
{
    Schema::create('narudzbinas', function (Blueprint $table) {
        $table->id();
        $table->foreignId('user_id')->constrained()->onDelete('cascade');

        $table->string('ime_prezime');
        $table->string('adresa');
        $table->string('broj_telefona');

        $table->string('status')->default('na čekanju');
        $table->text('napomena')->nullable();
        $table->timestamps();
    });

    Schema::create('narudzbina_proizvod', function (Blueprint $table) {
        $table->id();
        $table->foreignId('narudzbina_id')->constrained()->onDelete('cascade');
        $table->foreignId('proizvod_id')->constrained()->onDelete('cascade');
        $table->timestamps();
    });
}


    public function down()
    {
        Schema::table('narudzbinas', function (Blueprint $table) {
            $table->dropColumn(['ime_prezime', 'adresa', 'broj_telefona']);
        });
    }
}
