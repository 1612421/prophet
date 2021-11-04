<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateWagerTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('wagers', function (Blueprint $table) {
            $table->id();
            $table->unsignedInteger('total_wager_value');
            $table->unsignedInteger('odds');
            $table->unsignedTinyInteger('selling_percentage');
            $table->unsignedDouble('selling_price', 16, 2);
            $table->unsignedDouble('current_selling_price', 16, 2);
            $table->unsignedTinyInteger('percentage_sold')->nullable();
            $table->unsignedInteger('amount_sold')->nullable();
            $table->timestamp('placed_at')->nullable();
            $table->timestamp('updated_at')->nullable();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('wagers');
    }
}
