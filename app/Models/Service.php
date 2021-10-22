<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Service extends Model
{
    use HasFactory;
    protected $table='tbl_service';
    protected $fillable=[
        'service_fullname',
        'service_gender',
        'service_birthday',
        'service_address',
        'service_email',
        'service_mobilePhone',
        'service_homePhone',
        'service_officePhone'
    ];
    protected $primarykey='service_id';
}
