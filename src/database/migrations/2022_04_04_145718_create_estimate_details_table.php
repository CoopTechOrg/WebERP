<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateEstimateDetailsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('estimate_details', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('estimate_id')->comment('見積ID')->nullable(false);
            $table->unsignedBigInteger('product_id')->comment('商品ID')->nullable(false);
            $table->integer('price')->comment('税抜単価')->nullable(false);
            $table->integer('quantity')->comment('個数/時間数')->nullable(false);
            $table->text('remarks')->comment('備考')->default(null);
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
        Schema::dropIfExists('estimate_details');
    }
}
