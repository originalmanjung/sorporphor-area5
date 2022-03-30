<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class BlogSchoolPhoto extends Model
{
    use HasFactory;

    /**
     * The attributes that aren't mass assignable.
     *
     * @var array
     */
    protected $guarded = ['id'];
    /**
     * Get the user that owns the Newsphoto
     *
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function blogSchool()
    {
        return $this->belongsTo(BlogSchool::class);
    }
}
