<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class File extends Model
{
    use HasFactory;
    protected $table = 'files';
    protected $fillable =[
        'document_id',
        'name',
        'type',
        'size',
        'approved',
        'created_at',
        'updated_at'
    ];

    public function document(){
        $this->belongsTo(Documents::class);
    }

    
}
