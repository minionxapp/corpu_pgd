<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class GleadsModul extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('gleads_modul', function (Blueprint $table) {
            $table->id();
            $table->string('modul_id')->nullable();
            $table->string('program_name')->nullable();
            $table->string('skill_name')->nullable();
            $table->string('modul_name')->nullable();
            $table->integer('jamlat')->nullable();
            $table->string('hitung')->nullable();
            $table->integer('enrolled')->nullable();
            $table->integer('selesai')->nullable();
            $table->integer('progress')->nullable();
            $table->integer('belum')->nullable();
            $table->string('modul_type')->nullable();          
            $table->string('tahun')->nullable();
            $table->string('type_enroll')->nullable();
            // -----------------$table->string('test')->nullable();
            // $table->string('jenis_taining')->nullable();//jens
            // $table->string('kelompok')->nullable();//cerminan akademi
           
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
        //
    }
}
