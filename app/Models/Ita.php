<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use \Staudenmeir\LaravelAdjacencyList\Eloquent\HasRecursiveRelationships;
use Illuminate\Support\Facades\Storage;

class Ita extends Model
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

    public function scopeActive($query)
    {
        return $query->where('status', '=', 1);
    }

    /**
     * Get the user that owns the Legislation
     *
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */

    public function user()
    {
        return $this->belongsTo(User::class);
    }

    /**
     * Get all of the comments for the Ita
     *
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     */
    public function children()
    {
        return $this->hasMany(self::class, 'parent_id');
    }

    public static function boot() {
        parent::boot();
        self::deleting(function($ita) { // before delete() method call this
            foreach ($ita->children()->get() as $itaSub) {
                if (Storage::exists('public/ita_files/'.$itaSub->file)) {
                    Storage::delete('public/ita_files/'.$itaSub->file);
                }
                $itaSub->delete();
            }
        });
    }
    
}
