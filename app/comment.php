<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class comment extends Model
{
    protected $table = 'comment';
    
    protected $fillable = [
        'id','idUser','idTinTuc','noiDung',
    ];
    
    public $timestamps = false;
}
