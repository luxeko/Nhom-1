<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Notifications\Notifiable;

class Product extends Model
{
    use HasFactory;
    use Notifiable,
        SoftDeletes;
    protected $table = 'products';
    protected $guarded = [];
    protected $fillable = [];

    public function category(){
        return $this->belongsTo(Category::class, 'category_id');
    }
    public function getNameUserById(){
        return $this->belongsTo(User::class, 'user_id');
    }
    public function productImages(){
        return $this->hasMany(ProductImage::class, 'product_id');
    }
    public function discount(){
        return $this->belongsTo(discount::class, 'discount_id');
    }
}
