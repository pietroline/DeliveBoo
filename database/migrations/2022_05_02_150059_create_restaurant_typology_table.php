<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateRestaurantTypologyTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('restaurant_typology', function (Blueprint $table) {

            $table->unsignedBigInteger("restaurant_id");
            $table->foreign("restaurant_id")
                    ->references("id")
                    ->on("restaurants")
                    ->onDelete("cascade");

            $table->unsignedBigInteger("typology_id");
            $table->foreign("typology_id")
                    ->references("id")
                    ->on("typologies")
                    ->onDelete("cascade");

            $table->index(["restaurant_id", "typology_id"]);
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('restaurant_typology');
    }
}
