<?php

namespace App\Models;

use App\Models\Categories;
use Illuminate\Database\Eloquent\Model;
use Cviebrock\EloquentSluggable\Sluggable;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Products extends Model
{
    use HasFactory, Sluggable;
    protected $table = "products";
    protected $guarded = ['id'];
    public function sluggable(): array
    {
        return [
            'slug' => [
                'source' => 'nama'
            ]
        ];
    }

    public function categories()
    {
        return $this->belongsTo(Categories::class);
    }
    public function imgproducts()
    {
        return $this->hasMany(ImgProducts::class);
    }
}
