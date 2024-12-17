<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Media extends Model
{
   
    use HasFactory;
    protected $table = 'Medias';
    protected $fillable = [
        'title',
        'category_id',
        'author',
        'amount', 
        'status', 
        'membership',
        'fee'
    ];
    
    public function category()
    {
        return $this->belongsTo(Categories::class, 'category_id'); 
    }
}