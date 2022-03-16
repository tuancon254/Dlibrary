<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Semester extends Model
{
    use HasFactory;
    protected $table = "semester";
    protected $fillable = [
        'sem_name',
        'created_at',
        'updated_at'
    ];
    protected $primaryKey = 'sem_id';
}