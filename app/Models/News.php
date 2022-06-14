<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Storage;
Use Alert;

class News extends Model
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

    public function scopeGeneral($query)
    {
        return $query->where([['status', '=', '1'],['content', '=', 'general']]);
    }

    public function scopeHonest($query)
    {
        return $query->where([['status', '=', '1'],['content', '=', 'honest']]);
    }

    public function scopeCulture($query)
    {
        return $query->where([['status', '=', '1'],['content', '=', 'culture']]);
    }

    public function scopeParticipation($query)
    {
        return $query->where([['status', '=', '1'],['content', '=', 'participation']]);
    }

    public function scopeActive($query)
    {
        return $query->where('status', '=', 1);
    }

    public function scopeSlug($query, $slug)
    {
        return $query->where('slug', '=', $slug);
    }

    public static function UploadFile($file, $news)
    {
        foreach ($file as $photo) {
            $filename  = 'photo-' . uniqid() . '.' .$photo->getClientOriginalExtension();
            $path   = $photo->storeAs('news_photos', $filename, 'public');
            NewsPhoto::create([
                'news_id' => $news->id,
                'filename' => $filename
            ]);
        }
    }

    public static function boot() {
        parent::boot();
        self::deleting(function($news) { // before delete() method call this
            if ($news->newsphotos->isNotEmpty()) {
                foreach (NewsPhoto::where('news_id', '=', $news->id)->get() as $img) {
                    $imgArray[] = $img->filename;
                }
                foreach ($imgArray as $imgItem) {
                    if (Storage::exists('public/news_photos/'.$imgItem)) {
                        Storage::delete('public/news_photos/'.$imgItem);
                    } else {
                        Alert::error('File Not Found');
                        return back();
                    }
                }
            }
             $news->newsphotos()->each(function($newsphotos) {
                $newsphotos->delete(); // <-- direct deletion
             });
        });
    }

    /**
     * Get all of the comments for the News
     *
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     */
    public function newsphotos()
    {
        return $this->hasMany(NewsPhoto::class);
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


