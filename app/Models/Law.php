<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Storage;
use Staudenmeir\LaravelAdjacencyList\Eloquent\HasRecursiveRelationships;

class Law extends Model
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
        self::deleting(function($law) {
            foreach ($law->children()->get() as $lawItem) {
                if (Storage::exists('public/law_files/'.$lawItem->file)) {
                    Storage::delete('public/law_files/'.$lawItem->file);
                }
                $lawItem->delete();
            }
        });
    }
}
