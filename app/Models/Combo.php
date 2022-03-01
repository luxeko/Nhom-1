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
}
