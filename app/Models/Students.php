<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Students extends Model
{
    use HasFactory;
    protected $table = 'students';
    protected $fillable = [
        'student_id',
        'user_id',
        'class_id',
        'first_name',
        'last_name',
        'created_at',
        'updated_at'
    ];

    protected $primaryKey = 'student_id';
    public function user(){
        return $this->belongsTo(Users::class);
    }

    public function class(){
        return $this->belongsTo(Clas::class,'class_id','class_id');
    }
}
