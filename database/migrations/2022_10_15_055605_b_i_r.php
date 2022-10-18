<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class BIR extends Migration
{
    public function up()
    {
        Schema::create('BIR', function (Blueprint $table) {
            $table->id('id');
            $table->integer('UserNo');
            $table->text('Name');
            $table->text('Year')->nullable();
            $table->string('BIRForm')->nullable();
            $table->softDeletes();
        });
    }

    public function down()
    {
        Schema::dropIfExists('bir');
    }
}
