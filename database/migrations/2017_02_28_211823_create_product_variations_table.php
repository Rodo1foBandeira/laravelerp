<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateProductVariationsTable extends Migration
{
    // ProductVariations = Variaçoes de produto
    // Unidade de medida(mus_id) é quem varia
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('product_variations', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('product_id')->unsigned();
            $table->integer('mus_id')->unsigned(); // default measure unit system
            $table->integer('dmus_id')->unsigned(); // dimension measure unit system
            $table->integer('wmus_id')->unsigned(); // weight measure unit system
            $table->integer('um_id')->unsigned();
            $table->decimal('percaddit',12,4)->nullable();
            $table->decimal('valaddit',12,4)->nullable();
            $table->decimal('quantity',12,4)->nullable();
            $table->decimal('maxqtity',12,4)->nullable();
            $table->decimal('minqtity',12,4)->nullable();
            $table->decimal('length',12,4)->nullable(); // comprimento
            $table->decimal('width',12,4)->nullable(); // largura
            $table->decimal('height',12,4)->nullable(); // altura
            $table->decimal('weight',12,4)->nullable(); // peso
            $table->timestamps();

            $table->foreign('product_id')->references('id')->on('products');
            $table->foreign('mus_id')->references('id')->on('m_unit_systems');
            $table->foreign('dmus_id')->references('id')->on('m_unit_systems');
            $table->foreign('wmus_id')->references('id')->on('m_unit_systems');
            $table->foreign('um_id')->references('id')->on('unit_multipliers');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('product_variations');
    }
}
