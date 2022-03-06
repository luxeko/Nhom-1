<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Notifications\Notifiable;

class List_Product_Combo extends Model
{
    use HasFactory;
    use Notifiable,
        SoftDeletes;
    protected $table = 'list__product__combos';
    protected $guarded = [];
    
    public function getProduct(){
        
    }
}
