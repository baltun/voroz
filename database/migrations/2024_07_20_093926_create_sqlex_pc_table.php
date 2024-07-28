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
        Schema::create('sqlex_pc', function (Blueprint $table) {
            $table->integer('code');
            $table->integer('model');
            $table->integer('speed');
            $table->integer('ram');
            $table->float('hd');
            $table->string('cd', 5);
            $table->float('price');
//            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('sqlex_pc');
    }
};
