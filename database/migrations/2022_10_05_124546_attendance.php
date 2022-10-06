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
            $table->date('Start')->nullable();
            $table->date('End')->nullable();
            $table->boolean('Submitted')->default(0);
            $table->string('AttendanceSheet')->nullable();
        });
    }

    public function down()
    {
        Schema::dropIfExists('attendance');
    }
}
