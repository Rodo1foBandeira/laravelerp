<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateProductAttributesTable extends Migration
{
    // ProductAttributes = Atributos de produto
    // Ex:
    //  [
    //          {"id":1,"apattribute":"Branco","apkey":"cor","apvalue":"#ffffff"},
    //          {"id":2,"apattribute":"GG","apkey":"tamanho","apvalue":"GG"}
    //  ]

    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('product_attributes', function (Blueprint $table) {
            $table->increments('id');
            $table->string('pa_attribute',100);
            $table->string('pa_key',100)->nullable();
            $table->string('pa_value',100)->nullable();
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
        Schema::dropIfExists('product_attributes');
    }
}
