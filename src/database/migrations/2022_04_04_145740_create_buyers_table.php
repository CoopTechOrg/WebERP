<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateBuyersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('buyers', function (Blueprint $table) {
            $table->id();
            $table->string('email');
            $table->string('tel');
            $table->string('contact_person_family_name')->comment('販売先担当者姓')->nullable(false);
            $table->string('contact_person_given_name')->comment('販売先担当者名')->nullable(false);
            $table->integer('prefecture_id')->comment('都道府県ID')->nullable(false);
            $table->string('postal_code')->comment('郵便番号')->nullable(false);
            $table->string('city')->comment('市')->nullable(false);
            $table->string('town')->comment('町')->nullable(false);
            $table->string('building')->comment('ビル、町以下')->nullable(false);
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
        Schema::dropIfExists('buyers');
    }
}
