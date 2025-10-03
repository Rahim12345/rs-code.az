<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class VebFirmaStili extends Model
{
    use HasFactory;

    protected $table = 'veb_firma_stilis';
    protected $guarded = [];

    public function veb_dasiyicis()
    {
        return $this->hasOne(VebDasiyici::class,'id','veb_dasiyici_id');
    }
}
