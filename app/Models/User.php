<?php

namespace App\Models;

use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use OwenIt\Auditing\Contracts\Auditable;
use OwenIt\Auditing\Auditable as AuditableTrait;

class User extends Authenticatable implements Auditable
{
    use AuditableTrait, HasFactory, Notifiable, SoftDeletes;

    protected $fillable = [
        'name',
        'email',
        'password',
        'position',
        'userno',
        'dcode',
        'last_login_at',
        'last_login_ip'
    ];

    protected $hidden = [
        'password',
        'remember_token',
    ];

    protected $casts = [
        'email_verified_at' => 'datetime',
    ];

    protected function position(): Attribute
    {
        return new Attribute(
            get: fn ($value) =>  ["admin", "humanresources", "accounting", "employee", "chief"][$value],
        );
    }
}
