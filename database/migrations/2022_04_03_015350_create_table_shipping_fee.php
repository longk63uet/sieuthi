<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('shipping_fee', function (Blueprint $table) {
            $table->id();
            $table->timestamps();
            $table->integer('matp');
            $table->integer('maqh');
            $table->integer('matx');
            $table->integer('shpping_fee');

        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('table_shipping_fee');
    }
};
