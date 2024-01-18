<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Attribute extends Model
{
    use HasFactory;
    
    protected $fillable = ['name'];
    
    protected $guarded = ['id'];
    
    public function attribute_value()
    {
        return $this->hasMany(AttributeValue::class);
    }
}
