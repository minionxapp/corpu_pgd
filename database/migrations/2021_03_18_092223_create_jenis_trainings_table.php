<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateJenisTrainingsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('jenis_trainings', function (Blueprint $table) {
            $table->id();
              // -----------------$table->string('test')->nullable();
              $table->string('kode')->nullable();//jens
              $table->string('nama')->nullable();//cerminan akademi
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
        Schema::dropIfExists('jenis_trainings');
    }
}
