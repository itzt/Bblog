<?php

namespace App;
use DB;
use Config;

use Illuminate\Database\Eloquent\Model;

class Contacts extends Model
{

     /**
     * 可以被批量赋值的属性
     *
     * @var array
     */
    protected $fillable = ['name','subject','email','message'];
  
} 