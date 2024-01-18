<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class SizeGuide extends Model
{
    use HasFactory;

    protected $fillable = [
        'user_id',
        'title',
        'type',
        'description',
        'image',
        'country_size',
        'unit'
    ];

    protected $guarded = ['id'];

    public static function countrySize()
    {
        $countrySize['country_size'] = array('EU');
        return $countrySize;
    }

    public function size_guide_value()
    {
        return $this->hasMany(SizeGuideValue::class);
    }

    public function user()
    {
        return $this->belongsTo(User::class, 'user_id', 'id');
    }
}