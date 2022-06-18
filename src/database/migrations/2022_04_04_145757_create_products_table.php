<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateProductsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('products', function (Blueprint $table) {
            $table->id();
            $table->string('name')->comment('商品/作業内容名')->nullable(false); //品名
            $table->string('unit')->comment('単位')->nullable(false); //単位
            $table->text('remarks')->comment('備考')->default(null); //備考
            $table->unsignedBigInteger('created_by')->comment('作成者'); //ログインユーザー名
            $table->unsignedBigInteger('updated_by')->comment('更新者'); //ログインユーザー名
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
        Schema::dropIfExists('products');
    }
}
