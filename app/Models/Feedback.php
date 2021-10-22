<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Feedback extends Model
{
    use HasFactory;
    protected $table='tbl_feedback';
    protected $fillable=[
        'feedback_firstname',
        'feedback_lastname',
        'feedback_email',
        'feedback_phonenumber',
        'feedback_message'
    ];
    protected $primarykey='feedback_id';
}
