<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Cows extends Model
{
    use HasFactory;

    //Table Name
    protected $table = 'cows';
    //Primary Key
    public $primaryKey = 'id';
    //Timestamps
    public $timestamps = true;

    public function milk_record(){
        return $this->hasMany('App\Models\Milk_record');
    }

    public function health(){
        return $this->hasMany('App\Models\Health');
    }

    public function pregnancy(){
        return $this->hasMany('App\Models\Pregnancy');
    }
}
