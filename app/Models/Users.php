<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\Role;

class Users extends Model
{
    use HasFactory;

    protected $table = 'users';
    protected $fillable = [
        'name',
        'email',
        'username',
        'password',
        'phone_number',
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
            $permission = $role->permissions();
            if($permission->contains('per_name',$action)){
                return true;
            }
        
        }
        return false;
    }

}
