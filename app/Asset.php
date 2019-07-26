<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Asset extends Model
{
    protected $table = 'assets';
    protected $fillable =[
        "nombre_activo",
        "cat_id",
        "create_at",
        "update_at"
    ];
}
