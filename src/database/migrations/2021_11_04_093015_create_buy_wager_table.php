<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateBuyWagerTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('buy_wager', function (Blueprint $table) {
            $table->id();
            $table->foreignId('wager_id')->references('id')->on('wagers')->onDelete('cascade');
            $table->unsignedDouble('buying_price', 16, 2);
            $table->timestamp('bought_at')->nullable();
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
        Schema::dropIfExists('buy_wager');
    }
}
