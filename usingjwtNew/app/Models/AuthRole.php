<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class AuthRole extends Model
{
    use HasFactory;
    protected $fillable = [
        'user_id',
        'role_id',
        'application_id'
    ];

    protected $table = 'auth_role';

}
