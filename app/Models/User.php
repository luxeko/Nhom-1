<?php

namespace App\Models;

use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Laravel\Fortify\TwoFactorAuthenticatable;
use Laravel\Jetstream\HasProfilePhoto;
use Laravel\Sanctum\HasApiTokens;

class User extends Authenticatable
{
    use HasApiTokens, HasFactory, Notifiable,SoftDeletes;

    /**
     * The attributes that are mass assignable.
     *
     * @var string[]
     */

    protected $table = 'users';
    protected $guarded = [];
    protected $fillable = [
        'name',
        'email',
        'password',
        'full_name',
        'telephone',
        'avatar_img_path',
        'address_id'
    ];

    /**
     * The attributes that should be hidden for serialization.
     *
     * @var array
     */
    protected $hidden = [
        'password',
        'remember_token',
        'two_factor_recovery_codes',
        'two_factor_secret',
    ];

    /**
     * The attributes that should be cast.
     *
     * @var array
     */
    protected $casts = [
        'email_verified_at' => 'datetime',
    ];

    public function roles()
    {
        return $this->belongsToMany(Role::class, 'role_user', 'user_id', 'role_id');
    }
    public function checkPermissionAccess($permissionCheck){
        // user login có quyền thêm, sửa, xoá và xem
        // b1: lấy tất cả các quyền của user đang login hệ thống
        $roles = auth()->user()->roles;
        foreach($roles as $role){
            $permissions = $role->permissions;
            
            // b2: so sánh giá trị đưa vào của route hiện tại xem có tồn tại các quyền được cấp hay không
            if ($permissions->contains('key_code', $permissionCheck)) {
                return true;
            }

        }
        return false;


    }

}
