<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Role extends Model
{
    use HasFactory;

    public $table = 'roles';
    public $fillable = [
        'role_id',
        'role_name'
    ];
    protected $primaryKey = 'role_id';
    public function permissions()
    {
        return $this->belongsToMany(Permission::class,'role_permission','role_id','per_id');
    }

}
