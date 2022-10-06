<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Application extends Model
{
    public $table = 'application';
    use HasFactory;
    public $timestamps = false;
    protected $fillable = [
        'UserNo', 
        'ApplicationForm',
        'Submitted'
    ];
}
