<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class Attendance extends Migration
{
    public function up()
    {
        Schema::create('Attendance', function (Blueprint $table) {
            $table->id('id');
            $table->text('PayCode');
            $table->text('DCode');
            $table->text('UserNo');
            $table->text('Name');
            $table->text('Detachment')->nullable();
            $table->text('Location')->nullable();
            $table->integer('DaysWorked')->default(0);
            $table->integer('NSDifferential')->default(0);
            $table->integer('SHDays')->default(0);
            $table->integer('LHDays')->default(0);
            $table->boolean('Submitted')->default(0);
            $table->softDeletes();
        });
    }

    public function down()
    {
        Schema::dropIfExists('attendance');
    }
}
