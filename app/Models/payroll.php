<?php

namespace App\Models;

use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use OwenIt\Auditing\Contracts\Auditable;
use OwenIt\Auditing\Auditable as AuditableTrait;

class payroll extends Model implements Auditable
{
    use AuditableTrait;
    public $table = 'payroll';
    use HasFactory, SoftDeletes;
    public $timestamps = false;
    protected $fillable = [
        'PayCode',
        'DCode',
        'Detachment',
        'Location',
        'UserNo',
        'Name',
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
        'SSS',
        'SSSLoan',
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
