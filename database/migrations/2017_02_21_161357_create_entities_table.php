<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateEntitiesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('entities', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('neighborhood_id')->unsigned();
            $table->integer('postal_code_id')->unsigned();
            $table->string('name',150);
            $table->string('company',150)->nullable();
            $table->string('type',1)->nullable(); // F or J
            $table->string('cnpj_cpf',18)->nullable();
            $table->string('ie_rg',15)->nullable();
            $table->date('birth_date')->nullable();
            $table->string('address',100)->nullable();
            $table->string('address_number',30)->nullable();
            $table->string('address_complement',30)->nullable();
            $table->boolean('active')->nullable();
            $table->string('notes',255)->nullable();
            $table->timestamps();

            $table->foreign('neighborhood_id')->references('id')->on('neighborhoods');
            $table->foreign('postal_code_id')->references('id')->on('postal_codes');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('entities');
    }
}
