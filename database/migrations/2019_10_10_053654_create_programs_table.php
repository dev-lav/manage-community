<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateProgramsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('programs', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->bigInteger('crew_id')->unsigned()->nullable();
            $table->string('name', 50)->nullable($value = false);
            $table->string('description', 150);
            $table->timestamps();
            $table->softDeletes();

            $table
            ->foreign('crew_id')
            ->references('id')
            ->on('crews')
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
        Schema::dropIfExists('programs');
    }
}
