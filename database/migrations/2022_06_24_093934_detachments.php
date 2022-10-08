<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class Detachments extends Migration
{
    public function up()
    {
        Schema::create('Detachments', function (Blueprint $table) {
            $table->id('Id');
            $table->text('Detachment');
            $table->text('Location');
            $table->text('Region');
            $table->text('ContactNo');
            $table->text('Email');
            $table->text('Address');
            $table->softDeletes();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('detachments');
    }
}
