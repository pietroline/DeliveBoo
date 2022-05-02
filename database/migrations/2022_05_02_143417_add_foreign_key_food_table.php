<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AddForeignKeyFoodTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('foods', function (Blueprint $table) {
            
            $table->unsignedBigInteger("category_id")->nullable()->after('visible');

            $table->foreign("category_id")
                    ->references("id")
                    ->on("categories")
                    ->onDelete("set null");

            $table->unsignedBigInteger("restaurant_id")->nullable()->after('visible');

            $table->foreign("restaurant_id")
                    ->references("id")
                    ->on("restaurants")
                    ->onDelete("set null");

        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('foods', function (Blueprint $table) {
            $table->dropForeign("foods_category_id_foreign");
            $table->dropColumn("category_id");

            $table->dropForeign("foods_restaurant_id_foreign");
            $table->dropColumn("restaurant_id");
        });
    }
}
