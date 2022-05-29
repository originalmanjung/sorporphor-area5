<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Storage;

class Purchase extends Model
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

    public static function UploadFile($file, $purchase)
    {
        if($purchase->file != null){
            storage::disk('public')->delete('purchase_files/'.$purchase->file);
        }
        $filename  = 'file-' . uniqid() . '.' .$file->getClientOriginalExtension();
        $file->storeAs('purchase_files', $filename, 'public');
        $purchase->file = !isset($file) ? $purchase->file : $filename;
    }

    /**
     * Get the user that owns the purchase
     *
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function user()
    {
        return $this->belongsTo(User::class);
    }
}
