<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Support_detail extends Model
{
    protected $table = 'support_details';
    protected $fillable =[
        "sup_id",
        "asset_id",
        "cod_gamea",
        "serial_gamea",
        "caracteristicas",
        "estado",
        "tipo_servicio",
        "created_at",
        "updated_at"
    ];
}
