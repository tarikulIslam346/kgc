<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateScheduleDetailsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('schedule_details', function (Blueprint $table) {
            $table->increments('id');
            $table->string('pos')->nullable();
            $table->string('name')->nullable();
            $table->integer('to_par')->nullable();
            $table->string('hole')->nullable();
            $table->string('today')->nullable();
            $table->integer('r1')->nullable();
            $table->integer('r2')->nullable();
            $table->integer('r3')->nullable();
            $table->integer('r4')->nullable();
            $table->integer('total')->nullable();
            $table->integer('earnings')->nullable();
            $table->integer('hfh_ranking')->nullable();
            $table->integer('schedule_id');

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
        Schema::dropIfExists('schedule_details');
    }
}
