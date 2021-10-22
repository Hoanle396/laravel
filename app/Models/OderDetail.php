<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class OderDetail extends Model
{
    use HasFactory;
    protected $fillable = [
        'oder_code',
        'product_id',
        'product_name',
        'product_quantity',
        'user_fullname',
        'user_email',
        'user_phonenumber',
        'user_address',
        'user_address2',
        'oder_status',
        'oder_pay'
    ];
    protected $table='tbl_order_details';
    protected $primaryKey = 'oder_detail_id';
}
