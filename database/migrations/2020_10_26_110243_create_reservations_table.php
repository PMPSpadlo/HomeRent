<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateReservationsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('reservations', function (Blueprint $table) {
            $table->id();
            $table->bigInteger('home_id')->unsigned()->nullable();
            $table->integer('beds')->nullable();
            $table->integer('total_cost')->nullable();
            $table->dateTime('reservation_start')->nullable();
            $table->dateTime('reservation_end')->nullable();
            $table->timestamps();

            // foreign
            $table->foreign('home_id')->references('id')->on('homes')->onDelete('SET NULL');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('reservations');
    }
}
