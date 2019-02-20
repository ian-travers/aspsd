<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class AddPersonaColumnsToUsersTable extends Migration
{
    public function up()
    {
        Schema::table('users', function (Blueprint $table) {
            $table->string('patronymic_name')->nullable()->after('name');
            $table->string('first_name')->nullable()->after('name');
            $table->string('surname')->nullable()->after('name');
            $table->string('post')->nullable()->after('name');
        });
    }

    public function down()
    {
        Schema::table('users', function (Blueprint $table) {
            $table->dropColumn('patronymic_name');
            $table->dropColumn('first_name');
            $table->dropColumn('surname');
            $table->dropColumn('post');
        });
    }
}
