<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Storage;

class Job extends Model
{
    use HasFactory;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $guarded = ['id'];

    public function setNameAttribute($name)
    {
        $this->attributes['name'] = $name;
        $this->attributes['slug'] = slugUnicode($name);
    }

    public static function UploadFile($file, $job)
    {
        if($job->file != null){
            storage::disk('public')->delete('job_files/'.$job->file);
        }
        $filename  = 'file-' . uniqid() . '.' .$file->getClientOriginalExtension();
        $file->storeAs('job_files', $filename, 'public');
        $job->file = !isset($file) ? $job->file : $filename;
    }

    /**
     * Get the user that owns the job
     *
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function user()
    {
        return $this->belongsTo(User::class);
    }
}
