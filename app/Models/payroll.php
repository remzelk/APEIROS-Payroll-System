<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class payroll extends Model
{
    public $table = 'payroll';
    use HasFactory;
    public $timestamps = false;
    protected $primaryKey = 'Id';
}
