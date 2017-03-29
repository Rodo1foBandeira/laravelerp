<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateAttributesProductsTable extends Migration
{
    // AttributesProducts = Produto->Atributos (Relacionamentos)
    // Ex: [{"prodvar_id":1,"attribute_id":1},{"prodvar_id":1,"attribute_id":2}]

    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('attributes_products', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('prodvar_id')->unsigned();
            $table->integer('attribute_id')->unsigned();
            $table->timestamps();

            $table->foreign('prodvar_id')->references('id')->on('product_variations');
            $table->foreign('attribute_id')->references('id')->on('product_attributes');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('attributes_products');
    }
}
