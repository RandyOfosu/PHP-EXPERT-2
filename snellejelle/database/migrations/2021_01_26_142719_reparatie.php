<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class Reparatie extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('reparatie', function (Blueprint $table) {
            $table->id();
            $table->string('titel', 50);
            $table->date('datum');
            $table->time('tijdstip');
            $table->floatval('kosten');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExist('reparatie');
    }
}
