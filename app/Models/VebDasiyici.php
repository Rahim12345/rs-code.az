<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class VebDasiyici extends Model
{
    use HasFactory;

    protected $table = 'veb_dasiyicis';

    protected $guarded = [];

    public function numunes()
    {
        return $this->hasMany(VebDasiyiciNumune::class,'veb_dasiyici_id','id');
    }
}
