<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class BrifVeb extends Model
{
    use HasFactory;

    protected $table = 'brif_vebs';

    protected $guarded = [];

    public function firma_stilis()
    {
        return $this->hasMany(VebFirmaStili::class,'brif_veb_id','id');
    }

    public function web_gosteris()
    {
        return $this->hasMany(VebGosterici::class,'brif_veb_id','id');
    }
}
