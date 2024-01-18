<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Permission extends Model
{
    use HasFactory;
    
    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = ['name', 'slug', 'module_id'];
    
    protected $guarded = ['id'];
    
    public function module()
    {
        return $this->belongsTo(Module::class);
    }
    
    public function roles()
    {
        return $this->belongsToMany(Role::class);
    }
}
