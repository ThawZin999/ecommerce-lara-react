<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
    use HasFactory;

    protected $fillable = ['category_id','supplier_id','brand_id','name','slug','description','image','total_quantity','buy_price','discount_price','sale_price','view_count','like_count',];

    public function brand(){
        return $this->belongsTo(Brand::class);
    }

    public function category(){
        return $this->belongsTo(Category::class);
    }

    public function color(){
        return $this->belongsToMany(Color::class, 'product_color');
    }

    public function transaction(){
        return $this->belongsTo(ProductAddTransaction::class);
    }

    public function cart(){
        return $this->hasMany(ProductCart::class);
    }

    public function order(){
        return $this->hasMany(ProductOrder::class);
    }

    public function review(){
        return $this->hasMany(ProductReview::class);
    }
}
