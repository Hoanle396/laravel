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
        'oder_date',
        'oder_pay',
        'oder_status'
    ];
    protected $primarykey='order_id';
}
