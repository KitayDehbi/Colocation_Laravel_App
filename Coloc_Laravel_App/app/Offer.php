<?php

namespace App;
use Illuminate\Support\Str;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Storage;

class Offer extends Model
{
    protected $fillable = [
        'address', 'area', 'price','capacity','description','imgPath','user_id'
    ];

}
