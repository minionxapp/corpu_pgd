<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateDokumenLinksTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('dokumen_links', function (Blueprint $table) {
            $table->id();
            $table->string('nama');
            $table->string('jenis')->nullable();//dokumen,proposal,dll
            $table->string('deskripsi')->nullable();
            $table->string('pencarian')->nullable();//wor untuk pencarian
            $table->string('status')->nullable();//aktif atau tidak
            $table->date('tgl')->nullable();//tanggal dokumen
            $table->string('linkdok')->nullable();
            $table->string('pemilik')->nullable();
            $table->string('akses')->nullable();
            $table->string('filename')->nullable();
            $table->string('filename_real')->nullable();
            // $table->string('')->nullable();
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
        Schema::dropIfExists('dokumen_links');
    }
}
