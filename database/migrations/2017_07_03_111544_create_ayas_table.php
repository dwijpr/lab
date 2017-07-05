<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateAyasTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('ayas', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('aya_id')->unsigned()->index();
            $table->integer('sura_id')->unsigned()->index();
            $table->text('text');
            $table->text('terjemahan');
            $table->text('jalalayn');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('ayas');
    }
}
