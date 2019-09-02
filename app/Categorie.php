<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Categorie extends Model
{
    protected $table = 'categories';
    protected $fillable =[
        "cat_nombre",
        "created_at",
        "updated_at"
    ];
    protected $dateFormat = 'Y-m-d H:i:sO';
}
