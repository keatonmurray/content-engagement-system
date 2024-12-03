<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up()
{
    Schema::table('users', function (Blueprint $table) {
        $table->string('first_name')->after('id');
        $table->string('last_name')->after('first_name');
        
        $table->renameColumn('email', 'email_address');
        
        $table->unique('email_address');
    });
}

public function down()
{
    Schema::table('users', function (Blueprint $table) {
        $table->dropColumn('first_name');
        $table->dropColumn('last_name');
        
        $table->renameColumn('email_address', 'email');
        
        $table->dropUnique('users_email_address_unique');
    });
}

};
