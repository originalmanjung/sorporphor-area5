<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Storage;

class Legislation extends Model
{
    use HasFactory;

    protected $guarded = ['id'];

    public static function UploadFile($files, $names, $legislation)
    {
        for($i=0;$i<sizeof($names);$i++){
            $name[] = $names[$i];
            if(isset($files[$i]) && $files[$i]!=''){
                $filename  = 'file-' . uniqid() . '.' .$files[$i]->getClientOriginalExtension();
                $path[]   = $files[$i]->storeAs('legislation_files', $filename, 'public');
            }
            LegislationFile::create([
                'legislation_id' => $legislation->id,
                'name' =>  $name[$i],
                'filename' => $filename
            ]);
        }
    }

    public static function boot()
    {
        parent::boot();

        static::creating(function ($legislation) {
            $legislation->user_id = Auth::id();
        });

        self::deleting(function($legislation) { // before delete() method call this
            if ($legislation->legislationFiles->isNotEmpty()) {
                foreach (LegislationFile::where('legislation_id', '=', $legislation->id)->get() as $file) {
                    $fileArray[] = $file->filename;
                }
                foreach ($fileArray as $fileItem) {
                    if (Storage::exists('public/legislation_files/'.$fileItem)) {
                        Storage::delete('public/legislation_files/'.$fileItem);
                    } else {
                        Alert::error('File Not Found');
                        return back();
                    }
                }
            }
            $legislation->legislationFiles()->each(function($legislationFiles) {
                $legislationFiles->delete(); // <-- direct deletion
            });
        });

    }

    /**
     * Get all of the comments for the Legislation
     *
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     */
    public function legislationFiles()
    {
        return $this->hasMany(LegislationFile::class);
    }

    /**
     * Get the user that owns the Legislation
     *
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */

    public function user()
    {
        return $this->belongsTo(User::class);
    }

    /**
     * Get the user that owns the Legislation
     *
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function legislationList()
    {
        return $this->belongsTo(LegislationList::class);
    }

}
