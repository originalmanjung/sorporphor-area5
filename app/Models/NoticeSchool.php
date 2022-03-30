<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Storage;

class NoticeSchool extends Model
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

    public static function UploadFile($file, $noticeSchool)
    {
        if($noticeSchool->file != null){
            storage::disk('public')->delete('noticeSchool_files/'.$noticeSchool->file);
        }
        $filename  = 'file-' . uniqid() . '.' .$file->getClientOriginalExtension();
        $file->storeAs('noticeSchool_files', $filename, 'public');
        $noticeSchool->file = !isset($file) ? $noticeSchool->file : $filename;
    }

    public static function boot()
    {
        parent::boot();

        static::creating(function ($noticeSchool) {
            $noticeSchool->user_id = Auth::id();
        });
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
