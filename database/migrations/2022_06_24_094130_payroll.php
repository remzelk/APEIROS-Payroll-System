<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class Payroll extends Migration
{
    public function up()
    {
        Schema::create('Payroll', function (Blueprint $table) {
            $table->id('id');
            $table->text('PayCode');
            $table->text('DCode');
            $table->text('Detachment');
            $table->text('Location');
            $table->integer('UserNo');
            $table->text('Name');
            $table->integer('DaysWorked')->default(0);
            $table->decimal('RatePerDay')->nullable();
            $table->decimal('GrossPay')->nullable();
            $table->decimal('OfficersAllowance')->nullable();
            $table->integer('NSDifferential')->nullable();
            $table->decimal('NightDifferential')->nullable();
            $table->integer('SHDays')->nullable();
            $table->decimal('SpecialHoliday')->nullable();
            $table->integer('LHDays')->nullable();
            $table->decimal('LegalHoliday')->nullable();
            $table->decimal('OTAdj')->nullable();
            $table->decimal('FinalGrossPay')->nullable();
            $table->decimal('PhilHealth')->nullable();
            $table->decimal('HDMF')->nullable();
            $table->decimal('HDMFLoan')->nullable();
            $table->decimal('SSS')->nullable();
            $table->decimal('SSSLoan')->nullable();
            $table->decimal('FAMaintenance')->nullable();
            $table->decimal('RadioMaintenance')->nullable();
            $table->decimal('BankCharge')->nullable();
            $table->decimal('Insurance')->nullable();
            $table->decimal('CashBond')->nullable();
            $table->decimal('TotalDeduction')->nullable();
            $table->decimal('CashAdvance')->nullable();
            $table->decimal('TotalNetPay')->nullable();
            $table->softDeletes();
        });
    }

    public function down()
    {
        Schema::dropIfExists('payroll');
    }
}
