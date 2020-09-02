<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreatePayments extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('payments', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->integer('ext_id')->nullable();
            $table->char('name',255)->nullable();
            $table->char('display_name',255)->nullable();
            $table->char('move_name',255)->nullable();
            $table->date('payment_date')->nullable();
            $table->char('payment_type',255)->nullable();
            $table->char('state',255)->nullable();
            $table->double('amount',10,2)->nullable();
            $table->double('payment_difference',10,2)->nullable();
            $table->boolean('multi')->nullable();
            $table->boolean('has_invoices')->nullable();
            $table->integer('invoice_ids')->nullable();
            $table->integer('customer_id')->nullable();
            $table->char('customer_name',255)->nullable();
            $table->char('customer_type',255)->nullable();
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
        Schema::dropIfExists('payments');
    }
}
