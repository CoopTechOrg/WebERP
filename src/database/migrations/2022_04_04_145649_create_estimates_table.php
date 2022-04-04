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
            $table->string('no')->comment('見積もり番号')->unique();
            $table->string('subject')->comment('件名')->nullable(false);
            $table->unsignedBigInteger('buyer_id')->comment('販売先id')->nullable(false);
            $table->unsignedBigInteger('contacted_by')->comment('担当者')->nullable(false);
            $table->date('submited_at')->comment('提出日')->default(null);
            $table->boolean('is_lost')->comment('失注フラグ')->nullable(false)->default(false);
            $table->date('expirationed_at')->comment('有効期限')->default(null);
            $table->text('remarks')->comment('備考')->default(null);
            $table->unsignedBigInteger('created_by')->comment('作成者');
            $table->unsignedBigInteger('updated_by')->comment('更新者');
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
