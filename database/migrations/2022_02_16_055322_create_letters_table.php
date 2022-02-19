<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateLettersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('letters', function (Blueprint $table) {
            $table->id();
            $table->string('ledger_date');
            $table->integer('letter_type_id');
            $table->string('ledger_Sno');
            $table->integer('main_dispatch_id');
            $table->string('letter_no');
            $table->string('letter_date');
            $table->integer('title_id');
            $table->string('description');
            $table->string('received_form_or_sent_to');
            $table->string('d_up');
            $table->string('d_down');
            $table->string('d_remark');
            $table->string('ddg_up');
            $table->string('ddg_down');
            $table->string('dg_up');
            $table->string('dg_down');
            $table->string('dg_remark');
            $table->string('case_officer');
            $table->string('remark');
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
        Schema::dropIfExists('letters');
    }
}
