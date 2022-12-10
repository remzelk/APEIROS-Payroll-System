<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class Profile extends Migration
{
    public function up()
    {
        if (!Schema::hasTable('Profile')) {
            Schema::create('Profile', function (Blueprint $table) {
            $table->id('id');
            $table->string('Image')->nullable();    
            $table->integer('UserNo')->nullable();
            $table->text('LastName')->nullable();
            $table->text('FirstName')->nullable();
            $table->text('MiddleName')->nullable();
            $table->text('Extension')->nullable();
            $table->text('MP')->nullable();
            $table->text('NickName')->nullable();
            $table->string('Email')->nullable();
            $table->text('CurrentAddress')->nullable();
            $table->text('PermanentAddress')->nullable();
            $table->text('ContactNumber')->nullable();
            $table->date('DateOfBirth')->nullable();
            $table->text('PlaceOfBirth')->nullable();
            $table->text('Nationality')->nullable();
            $table->text('Sex')->nullable();
            $table->text('MaritalStatus')->nullable();
            $table->text('Religion')->nullable();
            $table->text('CPName')->nullable();
            $table->text('CPRelationship')->nullable();
            $table->text('CPAddress')->nullable();
            $table->text('CPContactNumber')->nullable();
            $table->text('SSS')->nullable();
            $table->text('PagIbig')->nullable();
            $table->text('Philhealth')->nullable();
            $table->text('TIN')->nullable();
            $table->softDeletes();
        });
    }
}
    public function down()
    {
        //
    }
}
