<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateEventsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('events', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->bigInteger('crew_id')->unsigned()->nullable();
            $table->bigInteger('venue_id')->unsigned()->nullable();
            $table->dateTime('date');
            $table->string('name', 50);
            $table->string('description', 150);
            $table->timestamps();
            $table->softDeletes();


            $table
                ->foreign('crew_id')
                ->references('id')
                ->on('crews')
                ->onDelete('cascade');

            $table
                ->foreign('venue_id')
                ->references('id')
                ->on('venues')
                ->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('events');
    }
}
