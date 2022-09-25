<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateEstimatesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('estimates', function (Blueprint $table) {
            $table->id();
            $table->string('no')->comment('見積もり番号')->unique(); //見積番号
            $table->string('subject')->comment('件名')->nullable(false); //件名
            $table->unsignedBigInteger('buyer_id')->comment('販売先id')->nullable(false); //ダミー
            $table->unsignedBigInteger('contacted_by')->comment('担当者')->nullable(false); //ダミー
            $table->date('submitted_at')->comment('提出日')->default(null); //発行日
            $table->boolean('is_lost')->comment('失注フラグ')->nullable(false)->default(false); //false
            $table->date('expired_at')->comment('有効期限')->default(null); //有効期限
            $table->text('remarks')->comment('備考')->default(null); //備考
            $table->unsignedBigInteger('created_by')->comment('作成者'); //ログインユーザーID
            $table->unsignedBigInteger('updated_by')->comment('更新者'); //ログインユーザーID
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
        Schema::dropIfExists('estimates');
    }
}
