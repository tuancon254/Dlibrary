<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Clas extends Model
{
    use HasFactory;
    protected $table = "class";
    protected $fillable = [
        'class_name',
        'sem_id',
        'created_at',
        'updated_at'
    ];

    protected $primaryKey = 'class_id';
    public function semester(){
        return $this->hasOne(Semester::class,'sem_id','sem_id');
    }

    public function students(){
        return $this->hasMany(Students::class,'class_id');
    }
}
