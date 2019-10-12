<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateEventPartnersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('event_partners', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->bigInteger('event_id')->unsigned()->nullable();
            $table->bigInteger('partner_id')->unsigned()->nullable();
            $table->timestamps();
            $table->softDeletes();


            $table
            ->foreign('event_id')
            ->references('id')
            ->on('events')
            ->onDelete('cascade');
        
            $table
            ->foreign('partner_id')
            ->references('id')
            ->on('partners')
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
        Schema::dropIfExists('event_partners');
    }
}
