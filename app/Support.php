<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Support extends Model
{
    protected $table = 'supports';
    protected $fillable =[
        "solicitante",
        "fec_solicitud",
        "sec_id",
        "dir_id",
        "uni_id",
        "tec_id",
        "celular_sol",
        "created_at",
        "updated_at",
        "codigo_gamea"
    ];
    protected $dateFormat = 'Y-m-d H:i:sO';
}
