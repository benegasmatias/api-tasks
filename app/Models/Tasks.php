<?php

namespace App\Models;


use Illuminate\Database\Eloquent\Model;

class Tasks extends Model 
{
    
    
     protected $table = 'tasks';


         
    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'name', 'description'
    ];


}
