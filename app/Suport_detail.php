<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Suport_detail extends Model
{
    protected $table = 'support_details';
    protected $fillable =[
        "sup_id",
        "asset_id",
        "cod_gamea",
        "serial_gamea",
        "caracteristicas",
        "estado",
        "created_at",
        "updated_at"
    ];
}
