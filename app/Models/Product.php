<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
    use HasFactory;
    protected $fillable = [
        'name',
        'price',
        'image',
        'desc',
        'category',
        'romaji_name',
        'status'
    ];
    public function Category()
    {
        return $this->belongsTo(Category::class);
    }
    
}
