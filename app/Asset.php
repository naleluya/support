<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Asset extends Model
{
    protected $table = 'assets';
    protected $fillable =[
        "nombre_activo_ser",
        "cat_id",
        "created_at",
        "updated_at"
    ];
    protected $dateFormat = 'Y-m-d H:i:sO';
}
