<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class product extends Model
{
    use HasFactory;
    protected $table="tbl_product";


    protected $fillable=[
        'product_name',
        'product_description',
        'product_image',
        'product_price',
        'product_origin',
        'product_manufacturer',
        'product_discount',
        'created_at',
        'updated_at',
    ];
    protected $primaryKey = 'product_id';
}
