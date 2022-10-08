<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class Announcement extends Migration
{
    public function up()
    {
        Schema::create('Announcement', function (Blueprint $table) {
            $table->id('id');
            $table->text('DateStart')->nullable();
            $table->text('DateEnd')->nullable();
            $table->text('Description');
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
        Schema::dropIfExists('announcement');
    }
}
