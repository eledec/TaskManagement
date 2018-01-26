<?php

namespace App;

use Carbon\Carbon;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDelete;

class Task extends Model
{
   use SoftDeletes;
    
    protected $table = 'tasks';
    
    protected $dates =['deleted_at']; 
    
    protected $fillable =[
        'name',
        'slug',
        'desc',
        'duedate',
        'completed'
    ];
    
    public function setDuedateAttribute($date)
    {
        $this->attributes['duedate'] = Carbon::parse($date);
    }
    
     public function user()
    {
       return $this->belongTo('App\User');
    }
    
     public function project()
    {
       return $this->belongTo('App\Projects');
    }
    
     public function subtasks()
    {
       return $this->hasMany('App\Task');
    }
}
