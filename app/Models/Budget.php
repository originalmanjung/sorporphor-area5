<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Storage;

class Budget extends Model
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

    public static function UploadFile($file, $budget)
    {
        if($budget->file != null){
            storage::disk('public')->delete('budget_files/'.$budget->file);
        }
        $filename  = 'file-' . uniqid() . '.' .$file->getClientOriginalExtension();
        $file->storeAs('budget_files', $filename, 'public');
        $budget->file = !isset($file) ? $budget->file : $filename;
    }

    /**
     * Get the user that owns the budget
     *
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function user()
    {
        return $this->belongsTo(User::class);
    }
}
