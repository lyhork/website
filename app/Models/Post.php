<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Astrotomic\Translatable\Contracts\Translatable as TranslatableContract;
use Astrotomic\Translatable\Translatable;
use Staudenmeir\EloquentEagerLimit\HasEagerLimit;
use App\Models\Gallery;


class Post extends Model implements TranslatableContract
{
    use HasFactory;
    use Translatable, HasEagerLimit;

    public $translatedAttributes = ['title','content','excerpt'];
    public $fillable = ['id','image'];

    public function galleries(){
        return $this->hasMany(Gallery::class);
    }

    
}
