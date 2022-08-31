<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AddNoToEstimateDetailsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('estimate_details', function (Blueprint $table) {
            //noを追加
            $table->after('id', function ($table) {
                $table->string('no')->comment('見積もり番号')->nullable(false)->unique(); //明細の番号
	    });
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('estimate_details', function (Blueprint $table) {
            //
        });
    }
}
