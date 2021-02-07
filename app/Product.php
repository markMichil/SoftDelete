<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\softDeletes;
use Spatie\MediaLibrary\HasMedia\HasMedia;
use Spatie\MediaLibrary\HasMedia\HasMediaTrait;

class Product extends Model  implements HasMedia
{
    use softDeletes;
    //
    use HasMediaTrait;

    protected $table = 'products';
    protected $fillable = [
        'name', 'qty', 'created_at','updated_at','deleted_at'
    ];

    public function last(){
        return    static::all()->last();
    }
}
