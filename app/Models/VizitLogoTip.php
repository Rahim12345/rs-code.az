<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class VizitLogoTip extends Model
{
    use HasFactory;

    protected $table = 'vizit_logo_tips';

    protected $guarded = [];

    public function kart()
    {
        return $this->hasOne(VizitKart::class,'id','vizit_id');
    }
}
