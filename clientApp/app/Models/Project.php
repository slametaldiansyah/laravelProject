<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Project extends Model
{
    use HasFactory;
    use SoftDeletes;
    protected $guarded=['id'];
    
    public function contract()
    {
    	return $this->belongsTo('App\Models\contract');
    }
    public function progress_item()
    {
    	return $this->hasMany('App\Models\progress_item');
    }
    public function project_cost()
    {
    	return $this->hasMany('App\Models\project_cost');
    }
    
    // public function getall()
    // {
    //   $data = Project::with(['contract.client'])->get();
    // 	return $data;
    // }
}