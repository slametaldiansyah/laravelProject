<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Contract extends Model
{
    use HasFactory;
    use SoftDeletes;
    protected $guarded=['id'];
    
    public function client()
    {
    	return $this->belongsTo('App\Models\client');
    }
    public function doc()
    {
    	return $this->hasMany('App\Models\contract_doc');
    }
    public function project()
    {
    	return $this->hasMany('App\Models\project');
    }
    
    protected static function boot() {
    parent::boot();

    static::deleted(function ($project) {
      $project->project()->delete();
    });
  }
}