<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class Fiets extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('fiets', function (Blueprint $table) {
            $table->id();
            $table->string('merk', 50);
            $table->string('model', 50);
            $table->text('type');
            $table->text('kleur');
            $table->boolean('electrisch');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('fiets');
    }
}
