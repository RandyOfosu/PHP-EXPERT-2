<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateReparatiesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('reparaties', function (Blueprint $table) {
            $table->id();
            $table->integer('user_id');
            $table->integer('fiets_id', NULL);
            $table->string('titel', 50);
            $table->date('datum');
            $table->time('tijdstip');
            $table->integer('kosten');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('reparaties');
    }
}
