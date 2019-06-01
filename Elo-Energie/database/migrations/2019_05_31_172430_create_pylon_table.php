<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreatePylonTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('pylons', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->string('ligne');
            $table->integer('numero');
            $table->float('longitude', 11, 8);
            $table->float('latitude', 11, 8);
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
        Schema::dropIfExists('pylon');
    }
}
