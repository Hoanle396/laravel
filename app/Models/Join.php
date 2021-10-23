<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Join extends Model
{
    use HasFactory;
    protected $table='tbl_join';
    protected $fillable=[
        'service_id',
        'service_fullname',
        'service_email',
        'join_time',
        'join_date',
        'join_description',
    ];
    protected $primarykey='join_id';
}
