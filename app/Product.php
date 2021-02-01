<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\softDeletes;


class Product extends Model
{
    use softDeletes;
    //

    protected $table = 'products';
    protected $fillable = [
        'name', 'qty', 'created_at','updated_at','deleted_at'
    ];
}
