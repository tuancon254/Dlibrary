<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Permission extends Model
{
    use HasFactory;
    public $timestamps = false;
    protected $table = "permissions";
    protected $primaryKey = 'per_id';

 
    public function permissionChild(){
        return $this->hasMany(Permission::class,'parent_id');
    }
}
