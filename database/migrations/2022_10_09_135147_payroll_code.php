<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class PayrollCode extends Migration
{
    public function up()
    {
        Schema::create('PayrollCode', function (Blueprint $table) {
            $table->id('id');
            $table->date('Start')->nullable();
            $table->date('End')->nullable();
            $table->text('PayCode')->nullable();
            $table->softDeletes();
        });
    }

    public function down()
    {
        Schema::dropIfExists('payrollcode');
    }
}
