<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Company extends Model
{
    use HasFactory;

    protected $table = 'companies';

    protected $guarded = [];

    public function group()
    {
        return $this->hasOne(Group::class,'id','group_id');
    }
}
