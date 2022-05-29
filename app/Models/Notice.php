<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Storage;

class Notice extends Model
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

    public static function UploadFile($file, $notice)
    {
        if($notice->file != null){
            storage::disk('public')->delete('notice_files/'.$notice->file);
        }
        $filename  = 'file-' . uniqid() . '.' .$file->getClientOriginalExtension();
        $file->storeAs('notice_files', $filename, 'public');
        $notice->file = !isset($file) ? $notice->file : $filename;
    }

    /**
     * Get the user that owns the Notice
     *
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function user()
    {
        return $this->belongsTo(User::class);
    }
}
