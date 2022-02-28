<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Notifications\Notifiable;

class Category extends Model
{
    use HasFactory;
    use Notifiable,
        SoftDeletes;
    protected $table = 'categories';
    protected $fillable = [
        'name', 'desc_name', 'status', 'parent_id', 'slug', 'created_at'
    ];

}
