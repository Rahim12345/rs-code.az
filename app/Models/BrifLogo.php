<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class BrifLogo extends Model
{
    use HasFactory;

    protected $table = 'brif_logos';

    protected $guarded = [];

    public function logotips()
    {
        return $this->hasOne(LogoTip::class,'id','logotipsecimi');
    }

    public function firma_styles()
    {
        return $this->hasMany(FirmLogoTip::class,'brif_id','id');
    }

    public function karparativkarts()
    {
        return $this->hasMany(VizitLogoTip::class,'brif_id','id');
    }

    public function konvertLogos()
    {
        return $this->hasMany(KonvertLogoTip::class,'brif_id','id');
    }
}
