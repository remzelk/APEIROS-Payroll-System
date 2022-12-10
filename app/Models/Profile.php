<?php

namespace App\Models;

use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use OwenIt\Auditing\Contracts\Auditable;
use OwenIt\Auditing\Auditable as AuditableTrait;

class Profile extends Model implements Auditable
{
    use AuditableTrait;
    public $table = 'profile';
    use HasFactory, SoftDeletes;
    public $timestamps = false;
    protected $fillable = [
        'UserNo', 
        'Image', 
        'LastName', 
        'FirstName', 
        'MiddleName',
        'Extension',
        'MP',
        'NickName', 
        'Email',
        'CurrentAddress', 
        'PermanentAddress', 
        'ContactNumber', 
        'DateOfBirth',
        'PlaceOfBirth',
        'Nationality',
        'Sex',
        'MaritalStatus',
        'Religion',
        'CPName',
        'CPRelationship',
        'CPAddress',
        'CPContactNumber',
        'SSS',
        'PagIbig',
        'Philhealth',
        'TIN'
    ];
}
