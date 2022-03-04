<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Notifications\Notifiable;

class Combo extends Model
{
    use HasFactory;
    use HasFactory;
    use Notifiable,
        SoftDeletes;
    protected $table = 'combos';
    protected $guarded = [];
    protected $fillable = [];

    public function list_product_combos(){
        return $this->belongsToMany(Product::class, 'list__product__combos', 'combo_id', 'product_id');
    }
}
