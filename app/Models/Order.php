<?php

namespace App\Models;

use App\Models\User;
use App\Models\Payment;
use App\Models\Product;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Order extends Model
{
    use HasFactory;
    protected $fillable = [
        'quantity',
        'price',
        'total',
        'payment',
        'status',
        'user_id',
        'product_id',
    ];
    // protected $guarded = [""];
    public function products()
    {
        return $this->belongsTo(Product::class,'product_id');
    }

    public function user()
    {
        return $this->belongsTo(User::class);
    }
    public function payments()
    {
        return $this->hasMany(Payment::class,'id');
    }

  
}
