<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class tintuc extends Model
{
    protected $table = 'tintuc';

    protected $fillable = [
        'id','idLoaiTin','idTheLoai','tacGia','tieuDe','noiDung','hinhAnh','soLuotXem','tag',
    ];

}
