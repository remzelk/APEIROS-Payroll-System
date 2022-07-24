<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class detachments extends Model
{
    public $table = 'detachments';
    use HasFactory;
    public $timestamps = false;
    protected $primaryKey = 'Id';
}
