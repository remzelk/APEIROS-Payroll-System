<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class LeaveRequests extends Migration
{
    public function up()
    {
        Schema::create('LeaveRequests', function (Blueprint $table) {
            $table->id('id');
            $table->text('LeaveNo');
            $table->integer('UserNo');
            $table->text('Name');
            $table->date('Start')->nullable();
            $table->date('End')->nullable();
            $table->integer('DaysUsed')->nullable()->default(0);
            $table->integer('PaidDaysUsed')->nullable()->default(0);
            $table->text('LeaveType')->nullable();
            $table->text('Reason')->nullable();
            $table->boolean('Approved')->nullable();
            $table->softDeletes();
        });
    }

    public function down()
    {
        Schema::dropIfExists('leaverequests');
    }
}
