<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateFightsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('fights', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('host_id');
            $table->unsignedBigInteger('guest_id');
            $table->unsignedBigInteger('winner_id')->nullable();
            $table->timestamp('invited_at')->nullable();
            $table->timestamp('fought_at')->nullable();
            $table->integer('host_money_received')->nullable();
            $table->integer('guest_money_received')->nullable();

            $table->softDeletes();

            $table->foreign('host_id')->references('id')->on('heroes');
            $table->foreign('guest_id')->references('id')->on('heroes');
            $table->foreign('winner_id')->references('id')->on('heroes');

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
        Schema::dropIfExists('fights');
    }
}
