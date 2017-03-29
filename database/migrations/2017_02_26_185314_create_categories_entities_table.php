<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateCategoriesEntitiesTable extends Migration
{
    // CategoriesEntities = entidade->categorias (Relacionamentos)
    // Ex: [{"entity_id":1,"category_id":1},{"entity_id":1,"category_id":2}])

    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('categories_entities', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('entity_id')->unsigned();
            $table->integer('category_id')->unsigned();
            $table->timestamps();

            $table->foreign('entity_id')->references('id')->on('entities');
            $table->foreign('category_id')->references('id')->on('entity_categories');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('categories_entities');
    }
}
