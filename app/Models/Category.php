<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Category extends Model
{
    use HasFactory;

    protected $table ="category";
    protected $fillable = [
        "title",
        "description",
        "parent_id",
        'is_collection',
        "created_at",
        "updated_at"
    ];

    public function documents(){
        return $this->hasMany(Documents::class,'category_id','id');
    }

    public function childCategory(){
        return $this->hasMany(Category::class,'parent_id');
    }
}
