<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Cache;

class Role extends Model
{
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

    public static function boot() {
        parent::boot();
        static::deleting(function($role) { // before delete() method call this
             $role->permissions()->detach();
        });
    }
    /**
     * Get all of the comments for the Role
     *
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     */
    public function users()
    {
        return $this->hasMany(User::class);
    }

    /**
     * The roles that belong to the Role
     *
     * @return \Illuminate\Database\Eloquent\Relations\BelongsToMany
     */
    public function permissions()
    {
        return $this->belongsToMany(Permission::class);
    }

}
