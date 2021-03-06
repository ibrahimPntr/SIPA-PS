<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateAnggotaPenelitiansTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('anggota_penelitians', function (Blueprint $table) {
            $table->unsignedBigInteger('penelitian_id');
            $table->unsignedBigInteger('user_id');
            $table->string('jabatan');
            $table->primary(array('penelitian_id','user_id'));
            $table->foreign('penelitian_id')
                ->references('penggunaan_dana_id')->on('penelitians')
                ->onUpdate('cascade')
                ->onDelete('cascade');
            $table->foreign('user_id')
                ->references('id')->on('users')
                ->onUpdate('cascade')
                ->onDelete('cascade');
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
        Schema::dropIfExists('anggota_penelitians');
    }
}
