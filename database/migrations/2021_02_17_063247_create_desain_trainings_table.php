<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateDesainTrainingsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('desain_trainings', function (Blueprint $table) {
            $table->id();
            $table->string('kode')->nullable();
            $table->string('nama')->nullable();
            $table->string('jenis_taining')->nullable();
            $table->string('kelompok')->nullable();//cerminan akademi
            $table->string('latar_tujuan')->nullable();
            $table->string('deskripsi')->nullable();
            $table->string('kriteria_peserta')->nullable();
            $table->string('fasilitator')->nullable();
            $table->integer('jml_hari');
            $table->integer('jml_jamlat');
            $table->string('tempat')->nullable();
            $table->date('tgl_mulai');
            $table->date('tgl_selesai');
            $table->string('metode')->nullable();
            $table->integer('jml_peserta')->nullable();
            $table->string('penilaian')->nullable();
            $table->bigInteger('investasi');
            $table->string('pre_class')->nullable();
            $table->string('post_class')->nullable();
            $table->string('pengusul')->nullable();
            $table->string('approval')->nullable();
            
            // $table->string('')->nullable();
            // $table->string('')->nullable();
            // $table->string('')->nullable();
            // $table->string('')->nullable();
            // $table->string('')->nullable();
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
        Schema::dropIfExists('desain_trainings');
    }
}
