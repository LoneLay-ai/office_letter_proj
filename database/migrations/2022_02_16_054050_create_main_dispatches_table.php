<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateMainDispatchesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('main_dispatches', function (Blueprint $table) {
            $table->id();
            $table->integer('main_dispatch_letter_no');
            $table->string('main_dispatch_letter_date');
            $table->string('description');
            $table->integer('div_id');
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
        Schema::dropIfExists('main_dispatches');
    }
}
