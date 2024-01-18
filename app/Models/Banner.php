<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Banner extends Model
{
    use HasFactory;

    protected $fillable = ['order', 'image', 'link', 'title', 'mobile_version', 'position', 'category_id', 'banner_type', 'status'];
    protected $guarded  = ['id'];

    public static function bannerType()
    {
        $bannerType['banner_type'] = array('col_1','col_2');
        return $bannerType;
    }
    public function category() {
        return $this->belongsTo(Category::class, 'category_id', 'id');
    }
}
