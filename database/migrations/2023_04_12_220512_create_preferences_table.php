<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreatePreferencesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('preferences', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->unsignedBigInteger('user_id');
            $table->boolean('vegetarian')->default(false);
            $table->boolean('vegan')->default(false);
            $table->boolean('nut_allergy')->default(false);
            $table->boolean('lactose_intolerance')->default(false);
            $table->boolean('gluten_intolerance')->default(false);
            $table->boolean('bio_food')->default(false);
            $table->boolean('local_food')->default(false);
            $table->string('favorite_food')->nullable();
            $table->timestamps();

            $table->foreign('user_id')->references('id')->on('users')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('preferences');
    }
}
