<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Storage;
use Staudenmeir\LaravelAdjacencyList\Eloquent\HasRecursiveRelationships;

class StandardService extends Model
{
    use HasFactory, HasRecursiveRelationships;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $guarded = ['id'];

    /**
     * Get the user that owns the StandardService
     *
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function user()
    {
        return $this->belongsTo(User::class);
    }

    public static function boot() {
        parent::boot();
        self::deleting(function($standardService) {
            foreach ($standardService->children()->get() as $standardServiceItem) {
                if (Storage::exists('public/StandardService_files/'.$standardServiceItem->file)) {
                    Storage::delete('public/StandardService_files/'.$standardServiceItem->file);
                }
                $standardServiceItem->delete();
            }
        });
    }
}
