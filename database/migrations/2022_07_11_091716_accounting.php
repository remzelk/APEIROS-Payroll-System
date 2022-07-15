<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class Accounting extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('Accounting', function (Blueprint $table) {
            $table->id('Id');
            $table->text('LastName');
            $table->text('FirstName');
            $table->text('MiddleName');
            $table->text('Extension');
            $table->text('MP');
            $table->text('NickName');
            $table->string('Email');
            $table->string('Password');
            $table->rememberToken();
            $table->text('CurrentAddress');
            $table->text('PermanentAddress');
            $table->text('ContactNumber');
            $table->text('ContactNumber2');
            $table->text('ContactNumber3');
            $table->text('ContactNumber4');
            $table->text('Facebook');
            $table->date('DateOfBirth');
            $table->text('PlaceOfBirth');
            $table->text('Nationality');
            $table->integer('Age');
            $table->text('Sex');
            $table->text('Height');
            $table->text('Weight');
            $table->text('MaritalStatus');
            $table->text('Religion');
            $table->text('ColorOfEyes');
            $table->text('Complexion');
            $table->text('DistinguishingFeature');
            $table->text('Position');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::drop('Accounting');
    }
}
