<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateAgedReceivables extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('aged_receivables', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('salesorder_id')->nullable();
            $table->integer('rep_id')->nullable();
            $table->integer('customer_id')->nullable();
            $table->char('sales_order')->nullable();
            $table->char('customer')->nullable();
            $table->char('rep')->nullable();
            $table->double('not_today', 15, 2)->nullable();
            $table->double('to_7', 15, 2)->nullable();
            $table->double('to_14', 15, 2)->nullable();
            $table->double('to_30', 15, 2)->nullable();
            $table->double('to_60', 15, 2)->nullable();
            $table->double('to_90', 15, 2)->nullable();
            $table->double('to_120', 15, 2)->nullable();
            $table->double('over_120', 15, 2)->nullable();
            $table->double('to_collect', 15, 2)->nullable();
            $table->double('collected', 15, 2)->nullable();
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
        Schema::dropIfExists('aged_receivables');
    }
}
