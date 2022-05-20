<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Storage;
use Staudenmeir\LaravelAdjacencyList\Eloquent\HasRecursiveRelationships;

class StandardPraticeGuide extends Model
{
    use HasFactory, HasRecursiveRelationships;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $guarded = ['id'];

    /**
     * Get the user that owns the Law
     *
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function user()
    {
        return $this->belongsTo(User::class);
    }

    public static function boot() {
        parent::boot();
        self::deleting(function($StandardPraticeGuides) {
            foreach ($StandardPraticeGuides->children()->get() as $StandardPraticeGuidesItem) {
                if (Storage::exists('public/StandardPraticeGuide_files/'.$StandardPraticeGuidesItem->file)) {
                    Storage::delete('public/StandardPraticeGuide_files/'.$StandardPraticeGuidesItem->file);
                }
                $StandardPraticeGuidesItem->delete();
            }
        });
    }
}
