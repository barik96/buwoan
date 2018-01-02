<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateBuwoansTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('buwoans', function (Blueprint $table) {
            $table->increments('id');
            $table->string('nama_tamu');
            $table->string('alamat_tamu');
            $table->string('isi_buwoan');
            $table->timestamps();
            $table->integer('user_id')->unsigned();
            
            $table->foreign('user_id')->references('id')->on('users');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('buwoans');
    }
}
