<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateHeroesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('heroes', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('kind_id');
            $table->unsignedBigInteger('user_id');
            $table->string('name');
            $table->integer('current_health_points');
            $table->integer('max_health_points');
            $table->integer('current_strength_points');
            $table->float('current_money');
            $table->integer('items_possessed');
            $table->integer('performed_fights');
            $table->float('money_tranfers');
            $table->integer('power');
            $table->float('attack_points');

            $table->softDeletes();

            $table->foreign('kind_id')->references('id')->on('kinds');
            $table->foreign('user_id')->references('id')->on('users');

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
        Schema::dropIfExists('heroes');
    }
}
