<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Item extends Model
{
    use HasFactory;

    protected $guarded = [];
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

    public function hasValidImages(): bool
    {
        // Hitung gambar umum (slot colour = null)
        $generalImageCount = $this->images()
            ->whereNull('colour')
            ->whereNotNull('image_name')
            ->count();

        if ($generalImageCount < 2) {
            return false;
        }

        // Ambil semua varian warna dari details
        $colours = $this->details()
            ->pluck('colour')
            ->unique()
            ->filter(); // hanya warna yang tidak null

        foreach ($colours as $colour) {
            $imageCount = $this->images()
                ->where('colour', $colour)
                ->whereNotNull('image_name')
                ->count();

            if ($imageCount < 1) {
                return false;
            }
        }

        return true; // Lolos semua
    }
}
