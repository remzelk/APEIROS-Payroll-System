<?php

namespace App\Models;

use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class detachments extends Model
{
    public $table = 'detachments';
    use HasFactory, SoftDeletes;
    public $timestamps = false;
    protected $primaryKey = 'Id';
}
