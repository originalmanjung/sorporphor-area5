<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class LegislationList extends Model
{
    use HasFactory;

    /**
     * The attributes that aren't mass assignable.
     *
     * @var array
     */
    protected $guarded = ['id'];

    public function setNameAttribute($name){
        $this->attributes['name'] = $name;
        $this->attributes['slug'] = slugUnicode($name);
    }

    public function scopeActive($query)
    {
        return $query->where('status', '=', 1);
    }

    public function scopeManualplanwork($query)
    {
        return $query->where('slug', '=', 'ยุธศาสตร์แผนปฏิบัติราชการ');
    }

    public function scopeManualwork($query)
    {
        return $query->where('slug', '=', 'คู่มือหรือมาตรฐานการปฏิบัติงาน');
    }
    /**
     * Get the user that owns the LegislationList
     *
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function role()
    {
        return $this->belongsTo(Role::class);
    }

    /**
     * Get all of the comments for the LegislationList
     *
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     */
    public function legislations()
    {
        return $this->hasMany(Legislation::class);
    }
}
