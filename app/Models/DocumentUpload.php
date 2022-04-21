<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class DocumentUpload extends Model
{
    use HasFactory;
    protected $table = 'document_upload';
    protected $fillable =[
        'user_id', 
        'title',
        'description',
        'date_of_issue',
        'category_id',
        'author',
        'sem_id',
        'file_name',
        'type',
        'size'
    ];
 
    protected $primaryKey = 'document_id';
    public function category(){
        return $this->belongsTo(Category::class,'category_id','id');
    }

    public function file(){
        return $this->hasOne(File::class,'document_id');
    }

    public function semester(){
        return $this->belongsToMany(Semester::class,'document_semester','document_id','sem_id');
    }
}
