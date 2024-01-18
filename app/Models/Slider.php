<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Slider extends Model
{
    use HasFactory;

    protected $fillable = ['order','status','mobile_version','action_type','link','bg_image'];

    protected $casts = ['bg_image' => 'array'];

    public function category()
    {
        return $this->belongsTo(Category::class,'link');
    }
}
