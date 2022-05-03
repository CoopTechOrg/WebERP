<?php

/***** usersテーブルに family_name と given_name カラム追加 *****/

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AddFamilyNameAndGivenNameToUsersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('users', function (Blueprint $table) {
            $table->string('family_name')->comment('姓')->nullable(false)->after('id');
            $table->string('given_name')->comment('名')->nullable(false)->after('family_name');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('users', function (Blueprint $table) {
            $table->dropColumn('family_name');
            $table->dropColumn('given_name');
        });
    }
}
