<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class ModifyOrdersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('orders', function (Blueprint $table) {
            $table->dropColumn([
                'pick1',
                'pick2',
                'pick3',
                'pick4',
                'pick5',
                'pick6',
                'pick7',
                'pick8',
                'pick9',
                'pick10',
                'pick11',
                'pick12'
            ]);

            $table->json('order')->nullable;
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        //
    }
}
