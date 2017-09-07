<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateOrdersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('orders', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('draft_id');
            $table->integer("pick1");
            $table->integer("pick2");
            $table->integer("pick3");
            $table->integer("pick4");
            $table->integer("pick5");
            $table->integer("pick6");
            $table->integer("pick7");
            $table->integer("pick8");
            $table->integer("pick9");
            $table->integer("pick10");
            $table->integer("pick11");
            $table->integer("pick12");
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
        Schema::dropIfExists('orders');
    }
}
