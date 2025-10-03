<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class FirmLogoTip extends Model
{
    use HasFactory;
    protected $table = 'firm_logo_tips';

    protected $guarded = [];

    public function firmaStyle()
    {
        return $this->hasOne(FirmaStili::class,'id','firma_id');
    }
}
