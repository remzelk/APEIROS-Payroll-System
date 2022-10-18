<?php

namespace App\Models;

use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class BIR extends Model
{
    public $table = 'bir';
    use HasFactory, SoftDeletes;
    public $timestamps = false;
}
