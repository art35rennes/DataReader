<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateStatementTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('statements', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->date('date');
            $table->string('nom');
            $table->bigInteger('pylon_A', false, true);
            $table->bigInteger('pylon_B', false, true);
            $table->foreign('pylon_A')->references('id')->on('pylons');
            $table->foreign('pylon_B')->references('id')->on('pylons');
            $table->timestamps();
            $table->engine = 'InnoDB';
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('statement');
    }
}
