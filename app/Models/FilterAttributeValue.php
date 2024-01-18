<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class FilterAttributeValue extends Model
{
    use HasFactory;

    protected $fillable = ['filter_attribute_id', 'value',];
    protected $guarded = ['id'];

    public function filterAttribute()
    {
        return $this->belongsTo(FilterAttribute::class, 'filter_attribute_id', 'id');
    }
}
