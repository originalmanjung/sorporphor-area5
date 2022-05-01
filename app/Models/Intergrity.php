<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Storage;

class Intergrity extends Model
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
        return $this->hasMany(Intergrity::class, 'parent_id');
    }


    public static function boot() {
        parent::boot();
        self::deleting(function($intergrity) {
            foreach ($intergrity->children()->get() as $intergrityItem) {
                if (Storage::exists('public/intergrity_files/'.$intergrityItem->file)) {
                    Storage::delete('public/intergrity_files/'.$intergrityItem->file);
                }
                $intergrityItem->delete();
            }
        });
    }
}
