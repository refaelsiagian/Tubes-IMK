<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Item extends Model
{
    use HasFactory;

    protected $fillable = [
        'id', // Ensure ID is fillable
        'item_name',
        'item_slug',
        'category_id',
        'item_description',
        'buying_price',
        'selling_price',
        'item_status',
        'stock',
    ];
    public $incrementing = false; // Use string IDs
    protected $keyType = 'string'; // Specify the key type as string
    protected $casts = [
        'id' => 'string', // Ensure the ID is treated as a string
    ];

    public function category()
    {
        return $this->belongsTo(Category::class);
    }
    
    public function images()
    {
        return $this->hasMany(Image::class);
    }
    
    public function details()
    {
        return $this->hasMany(Detail::class);
    }
}
