<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateUnitMultipliersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('unit_multipliers', function (Blueprint $table) {
            $table->increments('id');
            $table->string('um_name',100);
            $table->string('um_iso_code',5);
            $table->decimal('um_multiplier',10,4);
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
        Schema::dropIfExists('unit_multipliers');
    }
}
