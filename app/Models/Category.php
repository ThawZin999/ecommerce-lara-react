<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Category extends Model
{
    use HasFactory;

    protected $fillable = ['name', 'slug', 'mm_name', 'image'];
    protected $appends = ['image_url'];

    public function product(){
        return $this->hasMany(Product::class);
    }

    public function getImageUrlAttribute() {
        return asset('images/'.$this->image);
    }
}
