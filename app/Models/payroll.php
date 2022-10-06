<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class payroll extends Model
{
    public $table = 'payroll';
    use HasFactory;
    protected $fillable = [
        'UserNo',
        'Start',
        'End',
        'Name',
        'Detachment',
        'DaysWorked',
        'RatePerDay',
        'GrossPay',
        'OfficersAllowance',
        'NSDifferential',
        'NightDifferential',
        'SHDays',
        'SpecialHoliday',
        'LHDays',
        'LegalHoliday',
        'OTAdj',
        'FinalGrossPay',
        'PhilHealth',
        'HDMF',
        'HDMFLoan',
        'FAMaintenance',
        'RadioMaintenance',
        'BankCharge',
        'Insurance',
        'CashBond',
        'TotalDeduction',
        'CashAdvance',
        'TotalNetPay'
    ];
}
