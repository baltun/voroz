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
        Schema::create('sqlex_printer', function (Blueprint $table) {
            $table->integer('code');
            $table->integer('model');
            $table->char('color', 1);
            $table->string('type', 15);
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
        Schema::dropIfExists('sqlex_printer');
    }
};
