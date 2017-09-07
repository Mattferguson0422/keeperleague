<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateResultsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('results', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('draft_id')->unsigned();
            $table->integer('matt_1')->nullable();
            $table->integer('corinne_1')->nullable();
            $table->integer('mike_1')->nullable();
            $table->integer('katie_1')->nullable();
            $table->integer('megan_1')->nullable();
            $table->integer('kyle_1')->nullable();
            $table->integer('josh_1')->nullable();
            $table->integer('pj_1')->nullable();
            $table->integer('derek_1')->nullable();
            $table->integer('seth_1')->nullable();
            $table->integer('adam_1')->nullable();
            $table->integer('brent_1')->nullable();

            $table->integer('matt_2')->nullable();
            $table->integer('corinne_2')->nullable();
            $table->integer('mike_2')->nullable();
            $table->integer('katie_2')->nullable();
            $table->integer('megan_2')->nullable();
            $table->integer('kyle_2')->nullable();
            $table->integer('josh_2')->nullable();
            $table->integer('pj_2')->nullable();
            $table->integer('derek_2')->nullable();
            $table->integer('seth_2')->nullable();
            $table->integer('adam_2')->nullable();
            $table->integer('brent_2')->nullable();

            $table->integer('matt_3')->nullable();
            $table->integer('corinne_3')->nullable();
            $table->integer('mike_3')->nullable();
            $table->integer('katie_3')->nullable();
            $table->integer('megan_3')->nullable();
            $table->integer('kyle_3')->nullable();
            $table->integer('josh_3')->nullable();
            $table->integer('pj_3')->nullable();
            $table->integer('derek_3')->nullable();
            $table->integer('seth_3')->nullable();
            $table->integer('adam_3')->nullable();
            $table->integer('brent_3')->nullable();

            $table->integer('matt_4')->nullable();
            $table->integer('corinne_4')->nullable();
            $table->integer('mike_4')->nullable();
            $table->integer('katie_4')->nullable();
            $table->integer('megan_4')->nullable();
            $table->integer('kyle_4')->nullable();
            $table->integer('josh_4')->nullable();
            $table->integer('pj_4')->nullable();
            $table->integer('derek_4')->nullable();
            $table->integer('seth_4')->nullable();
            $table->integer('adam_4')->nullable();
            $table->integer('brent_4')->nullable();

            $table->integer('matt_5')->nullable();
            $table->integer('corinne_5')->nullable();
            $table->integer('mike_5')->nullable();
            $table->integer('katie_5')->nullable();
            $table->integer('megan_5')->nullable();
            $table->integer('kyle_5')->nullable();
            $table->integer('josh_5')->nullable();
            $table->integer('pj_5')->nullable();
            $table->integer('derek_5')->nullable();
            $table->integer('seth_5')->nullable();
            $table->integer('adam_5')->nullable();
            $table->integer('brent_5')->nullable();

            $table->integer('matt_6')->nullable();
            $table->integer('corinne_6')->nullable();
            $table->integer('mike_6')->nullable();
            $table->integer('katie_6')->nullable();
            $table->integer('megan_6')->nullable();
            $table->integer('kyle_6')->nullable();
            $table->integer('josh_6')->nullable();
            $table->integer('pj_6')->nullable();
            $table->integer('derek_6')->nullable();
            $table->integer('seth_6')->nullable();
            $table->integer('adam_6')->nullable();
            $table->integer('brent_6')->nullable();

            $table->integer('matt_7')->nullable();
            $table->integer('corinne_7')->nullable();
            $table->integer('mike_7')->nullable();
            $table->integer('katie_7')->nullable();
            $table->integer('megan_7')->nullable();
            $table->integer('kyle_7')->nullable();
            $table->integer('josh_7')->nullable();
            $table->integer('pj_7')->nullable();
            $table->integer('derek_7')->nullable();
            $table->integer('seth_7')->nullable();
            $table->integer('adam_7')->nullable();
            $table->integer('brent_7')->nullable();

            $table->integer('matt_8')->nullable();
            $table->integer('corinne_8')->nullable();
            $table->integer('mike_8')->nullable();
            $table->integer('katie_8')->nullable();
            $table->integer('megan_8')->nullable();
            $table->integer('kyle_8')->nullable();
            $table->integer('josh_8')->nullable();
            $table->integer('pj_8')->nullable();
            $table->integer('derek_8')->nullable();
            $table->integer('seth_8')->nullable();
            $table->integer('adam_8')->nullable();
            $table->integer('brent_8')->nullable();

            $table->integer('matt_9')->nullable();
            $table->integer('corinne_9')->nullable();
            $table->integer('mike_9')->nullable();
            $table->integer('katie_9')->nullable();
            $table->integer('megan_9')->nullable();
            $table->integer('kyle_9')->nullable();
            $table->integer('josh_9')->nullable();
            $table->integer('pj_9')->nullable();
            $table->integer('derek_9')->nullable();
            $table->integer('seth_9')->nullable();
            $table->integer('adam_9')->nullable();
            $table->integer('brent_9')->nullable();

            $table->integer('matt_10')->nullable();
            $table->integer('corinne_10')->nullable();
            $table->integer('mike_10')->nullable();
            $table->integer('katie_10')->nullable();
            $table->integer('megan_10')->nullable();
            $table->integer('kyle_10')->nullable();
            $table->integer('josh_10')->nullable();
            $table->integer('pj_10')->nullable();
            $table->integer('derek_10')->nullable();
            $table->integer('seth_10')->nullable();
            $table->integer('adam_10')->nullable();
            $table->integer('brent_10')->nullable();

            $table->integer('matt_11')->nullable();
            $table->integer('corinne_11')->nullable();
            $table->integer('mike_11')->nullable();
            $table->integer('katie_11')->nullable();
            $table->integer('megan_11')->nullable();
            $table->integer('kyle_11')->nullable();
            $table->integer('josh_11')->nullable();
            $table->integer('pj_11')->nullable();
            $table->integer('derek_11')->nullable();
            $table->integer('seth_11')->nullable();
            $table->integer('adam_11')->nullable();
            $table->integer('brent_11')->nullable();

            $table->integer('matt_12')->nullable();
            $table->integer('corinne_12')->nullable();
            $table->integer('mike_12')->nullable();
            $table->integer('katie_12')->nullable();
            $table->integer('megan_12')->nullable();
            $table->integer('kyle_12')->nullable();
            $table->integer('josh_12')->nullable();
            $table->integer('pj_12')->nullable();
            $table->integer('derek_12')->nullable();
            $table->integer('seth_12')->nullable();
            $table->integer('adam_12')->nullable();
            $table->integer('brent_12')->nullable();

            $table->integer('matt_13')->nullable();
            $table->integer('corinne_13')->nullable();
            $table->integer('mike_13')->nullable();
            $table->integer('katie_13')->nullable();
            $table->integer('megan_13')->nullable();
            $table->integer('kyle_13')->nullable();
            $table->integer('josh_13')->nullable();
            $table->integer('pj_13')->nullable();
            $table->integer('derek_13')->nullable();
            $table->integer('seth_13')->nullable();
            $table->integer('adam_13')->nullable();
            $table->integer('brent_13')->nullable();

            $table->integer('matt_14')->nullable();
            $table->integer('corinne_14')->nullable();
            $table->integer('mike_14')->nullable();
            $table->integer('katie_14')->nullable();
            $table->integer('megan_14')->nullable();
            $table->integer('kyle_14')->nullable();
            $table->integer('josh_14')->nullable();
            $table->integer('pj_14')->nullable();
            $table->integer('derek_14')->nullable();
            $table->integer('seth_14')->nullable();
            $table->integer('adam_14')->nullable();
            $table->integer('brent_14')->nullable();

            $table->integer('matt_15')->nullable();
            $table->integer('corinne_15')->nullable();
            $table->integer('mike_15')->nullable();
            $table->integer('katie_15')->nullable();
            $table->integer('megan_15')->nullable();
            $table->integer('kyle_15')->nullable();
            $table->integer('josh_15')->nullable();
            $table->integer('pj_15')->nullable();
            $table->integer('derek_15')->nullable();
            $table->integer('seth_15')->nullable();
            $table->integer('adam_15')->nullable();
            $table->integer('brent_15')->nullable();

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
        Schema::dropIfExists('results');
    }
}
