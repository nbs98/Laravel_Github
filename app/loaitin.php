<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class loaitin extends Model
{
    protected $table = 'loaitin';

    protected $fillable = [
        'id','idTheLoai','tenLoaiTin',
    ];

    public $timestamps = false;
}
