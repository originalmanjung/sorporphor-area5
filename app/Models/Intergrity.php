<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Storage;
use Staudenmeir\LaravelAdjacencyList\Eloquent\HasRecursiveRelationships;

class Intergrity extends Model
{
    use HasFactory, HasRecursiveRelationships;

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

    public function scopeActive($query)
    {
        return $query->where('status', '=', 1);
    }

    public function scopeMenualplanework($query)
    {
        return $query->where('slug', '=', 'ยุธศาสตร์แผนปฏิบัติราชการ');
    }

    public function scopeMenualwork($query)
    {
        return $query->where('slug', '=', 'คู่มือหรือมาตรฐานการปฏิบัติงาน');
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
