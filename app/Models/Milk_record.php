<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Milk_record extends Model
{
    use HasFactory;
    //Table Name
    protected $table = 'milk_records';
    //Primary Key
    public $primaryKey = 'id';
    //Timestamps
    public $timestamps = true;

    public function cow(){
        return $this->belongsTo('App\Models\Cows');
    }
    
}
