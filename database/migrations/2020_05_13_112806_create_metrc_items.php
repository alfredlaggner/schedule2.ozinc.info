<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateMetrcItems extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {

        Schema::create('metrc_items', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->bigIncrements('metrc_id');
            $table->char('Name',255)->nullable();
            $table->char('ProductCategoryName',255)->nullable();
            $table->char('ProductCategoryType',255)->nullable();
            $table->char('QuantityType',255)->nullable();
            $table->tinyInteger('DefaultLabTestingState');
            $table->dateTime('ApprovalStatusDateTime')->nullable();
            $table->tinyInteger('IsUsed');
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
        Schema::dropIfExists('metrc_items');
    }
}
