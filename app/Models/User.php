<?php

namespace App\Models;

use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Storage;
use Laravelista\Comments\Commenter;

class User extends Authenticatable
{
    use HasFactory, Notifiable, Commenter;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $guarded = ['id'];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'password',
        'remember_token',
    ];

    /**
     * The attributes that should be cast to native types.
     *
     * @var array
     */
    protected $casts = [
        'email_verified_at' => 'datetime',
    ];


    public function setPasswordAttribute($password)
    {
        if(Hash::needsRehash($password))
            $password = Hash::make($password);
        $this->attributes['password'] = $password;
    }

    public function setEmailAttribute($email)
    {
        $this->attributes['email'] = strtolower($email);
    }

    public function isAdmin()
    {
         return $this->role->slug == 'แอดมิน';
    }

    public static function UploadAvatar($photo, $user)
    {
        if($user->avatar != null){
            storage::disk('public')->delete('user_avatars/'.$user->avatar);
        }
        $filename  = 'photo-' . uniqid() . '.' .$photo->getClientOriginalExtension();
        $photo->storeAs('user_avatars', $filename, 'public');
        $user->avatar = !isset($photo) ? $user->avatar : $filename;
    }

    /**
     * Get the user that owns the User
     *
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function role()
    {
        return $this->belongsTo(Role::class);
    }

    /**
     * Get all of the comments for the User
     *
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     */
    public function news()
    {
        return $this->hasMany(News::class);
    }

    /**
     * Get all of the comments for the User
     *
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     */
    public function intergrities()
    {
        return $this->hasMany(Intergrity::class);
    }

    /**
     * Get all of the comments for the User
     *
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     */
    public function itas()
    {
        return $this->hasMany(Ita::class);
    }

    /**
     * Get all of the comments for the User
     *
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     */
    public function legislations()
    {
        return $this->hasMany(Legislation::class);
    }

    /**
     * Get all of the comments for the User
     *
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     */
    public function legislationCategories()
    {
        return $this->hasMany(LegislationCategory::class);
    }

    /**
     * Get all of the comments for the User
     *
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     */

    public function notices()
    {
        return $this->hasMany(Notice::class);
    }

    /**
     * Get all of the comments for the User
     *
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     */

    public function purchases()
    {
        return $this->hasMany(Purchase::class);
    }

    /**
     * Get all of the comments for the User
     *
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     */

    public function jobs()
    {
        return $this->hasMany(Job::class);
    }

    /**
     * Get all of the comments for the User
     *
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     */

    public function missions()
    {
        return $this->hasMany(Mission::class);
    }

    /**
     * Get the user associated with the User
     *
     * @return \Illuminate\Database\Eloquent\Relations\HasOne
     */
    public function school()
    {
        return $this->hasOne(School::class);
    }

    public function hasPermission($permission): bool
    {
        return $this->role->permissions()->where('slug', $permission)->first() ? true : false;
    }

    /**
     * Get the password for the user.
     *
     * @return string
     */
    // public function getAuthPassword()
    // {
    //     return Hash::make($this->password);
    // }
}
