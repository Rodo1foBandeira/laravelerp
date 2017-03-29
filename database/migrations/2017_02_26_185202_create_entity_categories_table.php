<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateEntityCategoriesTable extends Migration
{
    // EntityCategories = categoria(s) de entidade
    // Ex: [{"id":1,"category":"Cliente"},{"id":2,"category":"Fornecedor"}]
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('entity_categories', function (Blueprint $table) {
            $table->increments('id');
            $table->string('category',100);
            $table->string('eckey',100);
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
        Schema::dropIfExists('entity_categories');
    }
}