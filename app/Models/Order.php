<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Order extends Model
{
    use HasFactory;
    protected $table='tbl_order';
    protected $fillable=[
        'order_code',
        'order_date',
        'order_pay',
        'order_total',
        'order_status'
    ];
    protected $primarykey='order_id';
}
