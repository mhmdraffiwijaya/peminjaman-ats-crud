<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateDatapengembaliansTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('datapengembalian', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->string('idats');
            $table->text('namaats');
            $table->text('jumlah');
            $table->text('namapengembalian');
            $table->text('tgl');
            $table->text('fotopengembalian');
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
        Schema::dropIfExists('datapengembalians');
    }
}
