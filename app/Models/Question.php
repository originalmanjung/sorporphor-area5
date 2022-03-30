<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Notifications\Notifiable;
use Laravelista\Comments\Commentable;

class Question extends Model
{
    use HasFactory, Notifiable, Commentable;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $guarded = ['id'];

    public function setTitleAttribute($title){
        $this->attributes['title'] = $title;
        $this->attributes['slug'] = slugUnicode($title);
    }

    public function scopeSlug($query, $slug)
    {
        return $query->where('slug', '=', $slug);
    }

    public function getRouteKeyName()
    {
        return 'slug';
    }

    public static function boot() {
        parent::boot();
        static::deleting(function($question) { // before delete() method call this
            foreach ($question->comments as $comment) {
                $comment->delete();
            }
        });
    }

}
