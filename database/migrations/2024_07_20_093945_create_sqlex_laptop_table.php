<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    protected $primaryKey = null;
    public $incrementing = false;
    public $timestamps = false;

    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('sqlex_laptop', function (Blueprint $table) {
            $table->integer('code');
            $table->integer('model');
            $table->integer('speed');
            $table->integer('ram');
            $table->float('hd');
            $table->float('price');
            $table->integer('screen');
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
        Schema::dropIfExists('sqlex_laptop');
    }
};
