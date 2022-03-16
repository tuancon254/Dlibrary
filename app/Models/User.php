<?php

namespace App\Models;
use Illuminate\Support\Str;
use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Laravel\Sanctum\HasApiTokens;

class User extends Authenticatable
{
    use HasApiTokens, HasFactory, Notifiable;

    /**
     * The attributes that are mass assignable.
     *
     * @var string[]
     */

    protected $table = 'users';
    protected $fillable = [
        'name',
        'email',
        'username',
        'password',
        'phone_number',
    ];

    /**
     * The attributes that should be hidden for serialization.
     *
     * @var array
     */
    protected $hidden = [
        'password',
        'remember_token',
    ];

    /**
     * The attributes that should be cast.
     *
     * @var array
     */
    protected $casts = [
        'email_verified_at' => 'datetime',
    ];

    public function roles(){
        return $this->belongsToMany(Role::class,'user_role','user_id','role_id');
    }

    public function students(){
        return $this->hasOne(Students::class,'user_id');
    }

    public function checkPermission($action){
        $roles = auth()->user()->roles;
        foreach($roles as $role){
            $permission = $role->permissions;
            if($permission->contains('slug',$action)){
                return true;
            }
        }
        return false;
    }

    public function DocumentAccess($sem_id){
        $active = auth()->user()->students->class;
        if($active->sem_id == $sem_id){
            return true;
        }
        return false;
    }
}

