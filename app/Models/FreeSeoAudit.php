<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class FreeSeoAudit extends Model
{
    use HasFactory;

    protected $table = 'free_seo_audits';

    protected $fillable  = [
        'url',
        'email',
        'tel'
    ];
}
