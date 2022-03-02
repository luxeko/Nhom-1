<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Notifications\Notifiable;

class Role extends Model
{
    protected $guarded = [];

    public function permissions(){
        return $this->belongsToMany(Permission::class, 'permission_role', 'role_id','permission_id');
    }
 
}
