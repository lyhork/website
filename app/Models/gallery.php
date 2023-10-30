<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\Post;

class gallery extends Model
{
    use HasFactory;
    public $fillable = [
        'post_id',
        'images'
    ];

    public function posts(){
        return $this->belongsTo(Post::class);
    }
}
