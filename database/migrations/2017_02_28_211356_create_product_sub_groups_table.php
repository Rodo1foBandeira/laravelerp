<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateProductSubgroupsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('product_sub_groups', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('group_id')->unsigned();
            $table->string('psname',100);
            $table->timestamps();

            $table->foreign('group_id')->references('id')->on('product_groups');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('product_sub_groups');
    }
}
