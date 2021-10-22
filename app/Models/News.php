<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class News extends Model
{
    use HasFactory;
    protected $table='tbl_news';
    protected $fillable=[
        'news_title',
        'news_description',
        'news_image'
    ];
    protected $primarykey='news_id';
}
