<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Storage;
use Staudenmeir\LaravelAdjacencyList\Eloquent\HasRecursiveRelationships;

class HumanResource extends Model
{
    use HasFactory, HasRecursiveRelationships;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $guarded = ['id'];

    /**
     * Get the user that owns the Human Resource
     *
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function user()
    {
        return $this->belongsTo(User::class);
    }

    public static function boot() {
        parent::boot();
        self::deleting(function($humanResource) {
            foreach ($humanResource->children()->get() as $humanResourceItem) {
                if (Storage::exists('public/humanResource_files/'.$humanResourceItem->file)) {
                    Storage::delete('public/humanResource_files/'.$humanResourceItem->file);
                }
                $humanResourceItem->delete();
            }
        });
    }
}
