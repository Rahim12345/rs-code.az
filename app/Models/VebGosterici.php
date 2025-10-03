<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class VebGosterici extends Model
{
    use HasFactory;

    protected $table = 'veb_gostericis';
    protected $guarded = [];

    public function vesait()
    {
        return $this->hasOne(VebVesait::class,'id','veb_vesait_id');
    }
}
