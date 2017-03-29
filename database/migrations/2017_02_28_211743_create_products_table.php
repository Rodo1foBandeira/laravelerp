<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateProductsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('products', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('brand_id')->unsigned();
            $table->integer('group_id')->unsigned();
            $table->integer('subgroup_id')->unsigned();
            $table->integer('category_id')->unsigned();
            $table->string('prname',255);
            $table->string('prdescription',255)->nullable();
            $table->decimal('prcostprice',12,4)->nullable();
            $table->decimal('prcostmed',12,4)->nullable();
            $table->decimal('prsaleprice',12,4)->nullable();
            $table->decimal('prsalemed',12,4)->nullable();
            $table->timestamps();

            $table->foreign('brand_id')->references('id')->on('brands');
            $table->foreign('group_id')->references('id')->on('product_groups');
            $table->foreign('subgroup_id')->references('id')->on('product_sub_groups');
            $table->foreign('category_id')->references('id')->on('product_categories');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('products');
    }
}
