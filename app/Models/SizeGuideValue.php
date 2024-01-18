<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class SizeGuideValue extends Model
{
    use HasFactory;

    protected $fillable = [
        'size_guide_id',
        'size',
        'country_size_value',
        'shoulder',
        'length_tops',
        'sleeve_length',
        'bust',
        'length_bottoms',
        'waist_size',
        'hip_size',
        'thigh',
        'bottoms_length',
        'crown',
        'shoes_inner_length',
        'platform_length'
    ];

    protected $guarded = ['id'];

    public function size_guide()
    {
        return $this->belongsTo(SizeGuide::class, 'size_guide_id', 'id');
    }
}