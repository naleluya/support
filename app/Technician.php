<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Technician extends Model
{
    protected $table = 'technicians';
    protected $dateFormat = 'Y-m-d H:i:sO';
}
