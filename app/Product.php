<?php

namespace App;


use Spatie\Sluggable\HasSlug;
use Spatie\Sluggable\SlugOptions;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\softDeletes;
use Spatie\MediaLibrary\HasMedia\HasMedia;
use Spatie\MediaLibrary\HasMedia\HasMediaTrait;

class Product extends Model  implements HasMedia
{
    use softDeletes ;
    //
    use HasMediaTrait;

    use HasSlug;

    protected $table = 'products';
    protected $fillable = [
        'name', 'qty', 'slug','created_at','updated_at','deleted_at'
    ];

    public function last(){
        return    static::all()->last();
    }

/*
to do new slug from name like mark michil to change to(mark-michil)
 */
    public function getSlugOptions() : SlugOptions
    {
        return SlugOptions::create()
            ->generateSlugsFrom('name')
            ->saveSlugsTo('slug');
    }



    public function getRouteKeyName()
    {
        return 'slug';
    }

}
