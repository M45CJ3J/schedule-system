<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateSchedulesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('schedules', function (Blueprint $table) {
            $table->id();
            $table->timestamp('start')->nullable();
            $table->timestamp('end')->nullable();
            $table->string('title');
            $table->string('status')->nullable();
            $table->timestamps();
            $table->unsignedBigInteger('schedule_user');
            $table->foreign('schedule_user')->references('id')->on('users');
            $table->unsignedBigInteger('schedule_job');
          //  $table->foreign('schedule_job')->references('id')->on('jobs');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('schedules');
    }
}
