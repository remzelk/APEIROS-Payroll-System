<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class Application extends Migration
{
    public function up()
    {
        Schema::create('Application', function (Blueprint $table) {
            $table->id('id');
            $table->integer('UserNo');
            $table->text('Address')->nullable();
            $table->text('Phone')->nullable();
            $table->text('Email')->nullable();
            $table->text('SSS')->nullable();
            $table->text('PagIbig')->nullable();
            $table->text('Philhealth')->nullable();
            $table->text('TIN')->nullable();
            $table->text('DCode')->nullable();
            $table->boolean('Submitted')->nullable()->default(0);
            $table->string('ApplicationForm')->nullable();
            $table->softDeletes();
        });
    }

    public function down()
    {
        Schema::dropIfExists('application');
    }
    
}
