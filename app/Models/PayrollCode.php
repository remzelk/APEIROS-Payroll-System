<?php

namespace App\Models;

use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class PayrollCode extends Model
{
    public $table = 'payrollcode';
    use HasFactory, SoftDeletes;
    public $timestamps = false;
    protected $primaryKey = 'id';
}
