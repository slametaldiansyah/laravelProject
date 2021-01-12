<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Detail_user extends Model
{
    use HasFactory;

    protected $fillable = [
        'fullname',
        'name',
        'birth_date',
        'join_date',
        'position_id',
        'NIK',
        'NPWP',
        'email'
    ];

    protected $table = "detail_user";
}
