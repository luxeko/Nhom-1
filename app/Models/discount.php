<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Notifications\Notifiable;

class discount extends Model
{
    use HasFactory;
    use Notifiable,
        SoftDeletes;
        protected $table = 'discounts';
        protected $guarded = [];
        protected $fillable = [
            'name', 'desc', 'status', 'created_at'
        ];
}
