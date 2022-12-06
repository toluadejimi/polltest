<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class PollingUnit extends Model
{
    use HasFactory;

    public function announced_pu_result()
    {
        return $this->hasMany('App\AnnouncedPuResult');
    }

}
