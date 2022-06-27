<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class Employees extends Migration
{
    public function up()
    {
        Schema::create('Employees', function (Blueprint $table) {
            $table->id('Id');
            $table->text('LastName');
            $table->text('FirstName');
            $table->text('Gender');
            $table->text('Position');
            
        });
    }
    public function down()
    {
        //
    }
}
