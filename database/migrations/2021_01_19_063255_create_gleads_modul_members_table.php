<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateGleadsModulMembersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('gleads_modul_members', function (Blueprint $table) {
            $table->id();
            $table->timestamps();
            $table->string('User_Id')->nullable();
            $table->string('User_Name')->nullable();
            $table->string('Email')->nullable();
            $table->string('User_Status')->nullable();
            $table->string('Module_Name')->nullable();
            $table->string('Module_Type')->nullable();
            $table->string('Primary_Tag')->nullable();
            $table->string('Secondary_Tag')->nullable();
            $table->bigInteger('Estimated_Duration')->nullable();
            $table->bigInteger('Time_Spent')->nullable();
            $table->string('Enrollment_Type')->nullable();
            $table->string('Module_Status')->nullable();
            $table->bigInteger('Completion_Percentage')->nullable();
            $table->dateTime('Enrolled_On')->nullable();
            $table->dateTime('Started_On')->nullable();
            $table->dateTime('Completed_On')->nullable();
            $table->dateTime('Last_Accessed_On')->nullable();
            $table->string('Is_Complete')->nullable();
            $table->string('Program_Name')->nullable();
            $table->string('Skill_Name')->nullable();
            $table->bigInteger('Assessment_Count')->nullable();
            $table->bigInteger('Pass_Count')->nullable();
            $table->bigInteger('Average_Score')->nullable();
            $table->string('Designation')->nullable();
            $table->string('Department')->nullable();
            $table->string('Sub_Department')->nullable();
            $table->string('Location')->nullable();
            $table->string('Grade')->nullable();
            
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
        Schema::dropIfExists('gleads_modul_members');
    }
}
