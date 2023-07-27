<?php

namespace App\Models;

use App\Models\Product;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Review extends Model
{
    use HasFactory;
    protected $fillable = [
        'review',
        'name',
        'email',
    ];
    public function products()
    {
        return $this->belongsTo(Product::class,'product_id');
    }
}
