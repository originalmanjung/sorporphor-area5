<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Letter extends Model
{
    use HasFactory;

     /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $guarded = ['id'];

    public function setNameAttribute($name){
        $this->attributes['name'] = $name;
        $this->attributes['slug'] = slugUnicode($name);
    }

    public function scopeRegion($query)
    {
        return $query->where('type', '=', 'region');
    }

    public function scopeDistrict($query)
    {
        return $query->where('type', '=', 'district');
    }

    public function scopeSlug($query, $slug)
    {
        return $query->where('slug', '=', $slug);
    }

    /**
     * Get the user that owns the job
     *
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function user()
    {
        return $this->belongsTo(User::class);
    }
}
