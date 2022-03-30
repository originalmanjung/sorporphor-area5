<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class LegislationFile extends Model
{
    use HasFactory;

    protected $guarded = ['id'];

    /**
     * Get the user that owns the LegislationFile
     *
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function legislation()
    {
        return $this->belongsTo(Legislation::class);
    }
}
