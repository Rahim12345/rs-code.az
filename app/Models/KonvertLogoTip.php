<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class KonvertLogoTip extends Model
{
    use HasFactory;

    protected $table = 'konvert_logo_tips';

    protected $guarded = [];

    public function logo()
    {
        return $this->hasOne(Konvert::class,'id','konvert_id');
    }
}
