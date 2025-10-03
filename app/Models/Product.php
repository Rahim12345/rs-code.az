<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
    use HasFactory;

    protected $table = 'products';

    protected $guarded = [];

    public function images()
    {
        return $this->hasMany(ProductImage::class,'product_id','id')->orderBy('order_no','asc');
    }

    public function service()
    {
        return $this->hasOne(Service::class,'id','service_id');
    }

    public function company()
    {
        return $this->hasOne(Company::class,'id','company_id');
    }
}
