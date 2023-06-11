<?php

namespace App\Models;

use App\Models\Products;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class ImgProducts extends Model
{
    use HasFactory;
    protected $table = "imgproducts";
    protected $guarded = ['id'];
    public function products()
    {
        return $this->belongsTo(Products::class);
    }
}
