<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateTicketsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('tickets', function (Blueprint $table) {
            $table->id();
            $table->string('no_tiket')->nullable();
            $table->string('nik')->nullable();
            $table->string('nama')->nullable();
            $table->string('email')->nullable();
            $table->string('notelp')->nullable();
            $table->string('kategori')->nullable();
            $table->string('judul')->nullable();
            $table->string('detail')->nullable();
            $table->string('status')->nullable();
            $table->string('tgl_selesai')->nullable();
            $table->string('prioritas')->nullable();
            $table->string('tindakan')->nullable();
            $table->string('file_sisipan')->nullable();
            // $table->string('')->nullable();
            $table->timestamps();
            $table->string('create_by')->nullable();
            $table->string('update_by')->nullable();


        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('tickets');
    }
}
