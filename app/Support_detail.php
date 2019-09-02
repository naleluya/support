<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Support_detail extends Model
{
    protected $table = 'support_details';
    protected $fillable =[
        "sup_id",
        "asset_id",
        "cod_gamea_p",
        "serial_gamea",
        "caracteristicas",
        "estado",
        "created_at",
        "updated_at"
    ];
    protected $dateFormat = 'Y-m-d H:i:sO';
}
