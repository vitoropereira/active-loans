<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{

    public $value = NULL;
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('lending_open_positions', function (Blueprint $table) {
            $table->id();
            $table->string('RptDt')->nullable();
            $table->string('TckrSymb')->nullable();
            $table->string('ISIN')->nullable();
            $table->string('Asst')->nullable();
            $table->string('BalQty')->nullable();
            $table->string('TradAvrgPric')->nullable();
            $table->string('PricFctr')->nullable();
            $table->string('BalVal')->nullable();
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
        Schema::dropIfExists('lending_open_positions');
    }
};
