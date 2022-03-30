<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Storage;
Use Alert;

class BlogSchool extends Model
{
    use HasFactory;

    /**
     * The attributes that aren't mass assignable.
     *
     * @var array
     */
    protected $guarded = ['id'];

    public function setTitleAttribute($title){
        $this->attributes['title'] = $title;
        $this->attributes['slug'] = slugUnicode($title);
    }

    public function scopeActive($query)
    {
        return $query->where('status', '=', 1);
    }

    public function scopeSlug($query, $slug)
    {
        return $query->where('slug', '=', $slug);
    }

    public static function UploadFile($file, $blogSchool)
    {
        foreach ($file as $photo) {
            $filename  = 'photo-' . uniqid() . '.' .$photo->getClientOriginalExtension();
            $path   = $photo->storeAs('blogschool_photos', $filename, 'public');
            BlogSchoolPhoto::create([
                'blog_school_id' => $blogSchool->id,
                'filename' => $filename
            ]);
        }
    }

    public static function boot() {
        parent::boot();
        self::deleting(function($blogSchool) { // before delete() method call this
            if ($blogSchool->blogSchoolPhotos->isNotEmpty()) {
                foreach (BlogSchoolPhoto::where('blog_school_id', '=', $blogSchool->id)->get() as $img) {
                    $imgArray[] = $img->filename;
                }
                foreach ($imgArray as $imgItem) {
                    if (Storage::exists('public/blogschool_photos/'.$imgItem)) {
                        Storage::delete('public/blogschool_photos/'.$imgItem);
                    } else {
                        Alert::error('File Not Found');
                        return back();
                    }
                }
            }
             $blogSchool->blogSchoolPhotos()->each(function($blogSchoolPhotos) {
                $blogSchoolPhotos->delete(); // <-- direct deletion
             });
        });
    }

    /**
     * Get all of the comments for the News
     *
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     */
    public function blogSchoolPhotos()
    {
        return $this->hasMany(BlogSchoolPhoto::class);
    }

    /**
     * Get the user that owns the News
     *
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function user()
    {
        return $this->belongsTo(User::class);
    }
}
