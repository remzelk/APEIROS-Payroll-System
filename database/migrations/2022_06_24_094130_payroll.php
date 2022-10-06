<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class Payroll extends Migration
{
    public function up()
    {
        Schema::create('Payroll', function (Blueprint $table) {
            $table->id('Id');
            $table->integer('UserNo');
            $table->date('Start');
            $table->date('End');
            $table->text('Name');
            $table->text('Detachment');
            $table->integer('DaysWorked')->default(0);
            $table->decimal('RatePerDay');
            $table->decimal('GrossPay');
            $table->decimal('OfficersAllowance');
            $table->integer('NSDifferential');
            $table->decimal('NightDifferential');
            $table->integer('SHDays');
            $table->decimal('SpecialHoliday');
            $table->integer('LHDays');
            $table->decimal('LegalHoliday');
            $table->decimal('OTAdj');
            $table->decimal('FinalGrossPay');
            $table->decimal('PhilHealth');
            $table->decimal('HDMF');
            $table->decimal('HDMFLoan');
            $table->decimal('FAMaintenance');
            $table->decimal('RadioMaintenance');
            $table->decimal('BankCharge');
            $table->decimal('Insurance');
            $table->decimal('CashBond');
            $table->decimal('TotalDeduction');
            $table->decimal('CashAdvance');
            $table->decimal('TotalNetPay');
        });
    }

    public function down()
    {
        Schema::dropIfExists('payroll');
    }
}
