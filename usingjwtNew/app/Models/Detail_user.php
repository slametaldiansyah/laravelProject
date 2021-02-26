<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Detail_user extends Model
{
    use HasFactory;
    protected $guarded=['id'];

    // protected $fillable = [
    //     'fullname',
    //     'name',
    //     'birth_date',
    //     'join_date',
    //     'position_id',
    //     'NIK',
    //     'NPWP',
    //     'email'
    // ];

    public function position(){
        return $this->belongsTo('App\Models\Position','position_id','id');
    }

    protected $table = "detail_user";
}
