<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateDatapeminjamsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('datapeminjam', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->string('idats');
            $table->text('namaats');
            $table->text('jumlah');
            $table->text('namapeminjam');
            $table->text('tgl');
            $table->text('fotopeminjam');
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
        Schema::dropIfExists('datapeminjams');
    }
}
