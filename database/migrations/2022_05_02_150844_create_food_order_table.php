<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateFoodOrderTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('food_order', function (Blueprint $table) {

            $table->unsignedBigInteger("food_id");
            $table->foreign("food_id")
                    ->references("id")
                    ->on("foods")
                    ->onDelete("cascade");

            $table->unsignedBigInteger("order_id");
            $table->foreign("order_id")
                    ->references("id")
                    ->on("orders")
                    ->onDelete("cascade");

            $table->integer("quantity")->default(1);

            $table->index(["food_id", "order_id", "quantity"]);

        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('food_order');
    }
}
