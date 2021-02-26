<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Position extends Model
{
    use HasFactory;
    protected $guarded=['id'];

    // protected $fillable = [
    //     'name'
    // ];

    public function detail_user()
    {
        return $this->hasMany('App\Models\Detail_user');
    }

    protected $table = 'position';
}
