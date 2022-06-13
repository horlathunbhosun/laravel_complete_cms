<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AddColumnsToUsersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('users', function (Blueprint $table) {
            //
            $table->string('username')->nullable()->after('email');
            $table->string('gender')->nullable()->after('username');
            $table->string('user_type')->nullable()->after('gender')->default('users');
            $table->string('verified')->default(0)->after('user_type');
            $table->string('verification_code')->nullable()->after('verified');

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
            //
            $table->dropColumn('username','gender','user_type','verified');
        });
    }
}
