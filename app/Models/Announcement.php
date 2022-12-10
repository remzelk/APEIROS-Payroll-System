<?php

namespace App\Models;

use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use OwenIt\Auditing\Contracts\Auditable;
use OwenIt\Auditing\Auditable as AuditableTrait;

class Announcement extends Model implements Auditable
{
    use AuditableTrait;
    public $table = 'announcement';
    use HasFactory, SoftDeletes;
    public $timestamps = false;
}
