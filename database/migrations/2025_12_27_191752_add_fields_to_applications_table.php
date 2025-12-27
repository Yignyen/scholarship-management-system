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
    Schema::table('applications', function (Blueprint $table) {
        $table->string('name')->after('scholarship_id');
        $table->string('email')->after('name');
        $table->string('phone')->after('email');
        $table->date('dob')->after('phone');
        $table->string('gender')->after('dob');
        $table->string('rc')->nullable()->after('gender');
        $table->text('address')->nullable()->after('rc');
    });
}


    /**
     * Reverse the migrations.
     */
    public function down()
{
    Schema::table('applications', function (Blueprint $table) {
        $table->dropColumn([
            'name',
            'email',
            'phone',
            'dob',
            'gender',
            'rc',
            'address'
        ]);
    });
}

};
