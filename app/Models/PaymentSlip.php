<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Storage;

class PaymentSlip extends Model
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

    public static function UploadFile($file, $paymentSlip)
    {
        if($paymentSlip->file != null){
            storage::disk('public')->delete('paymentSlip_files/'.$paymentSlip->file);
        }
        $filename  = 'file-' . uniqid() . '.' .$file->getClientOriginalExtension();
        $file->storeAs('paymentSlip_files', $filename, 'public');
        $paymentSlip->file = !isset($file) ? $paymentSlip->file : $filename;
    }

    public static function boot()
    {
        parent::boot();

        static::creating(function ($paymentSlip) {
            $paymentSlip->user_id = Auth::id();
        });
    }
    /**
     * Get the user that owns the paymentSlip
     *
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function user()
    {
        return $this->belongsTo(User::class);
    }
}
