<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Collection extends Model
{
    use HasFactory;

    protected $fillable = ['name', 'slug', 'description', 'products', 'icon', 'image', 'status'];
    protected $guraded = ['id'];

    const ACTIVE    = 'published';
    const INACTIVE  = 'draft';

    public function products()
    {
        return $this->belongsToMany(Product::class);
    }

    public static function status()
    {
        $statusCollection['status'] = array('published', 'draft');
        return $statusCollection;
    }
}