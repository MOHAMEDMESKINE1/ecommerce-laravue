<?php

namespace App\Models;

use App\Models\Order;
use App\Models\Review;
use App\Models\Category;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Product extends Model
{
    use HasFactory;
    // public $timestamps = false;
    protected $fillable = [
        'title',
        'description',
        'photo',
        'price',
        'old_price',
        'quantity',
        'size',
        'color',
        'category',
    ];
    // protected $guarded  = [""];
    public function categories()
    {
        return $this->belongsTo(Category::class,'category_id');
    }
    public function orders()
    {
        return $this->hasMany(Order::class,'order_id');
    }
    public function reviews()
    {
        return $this->hasMany(Review::class,'review_id');
    }
}
