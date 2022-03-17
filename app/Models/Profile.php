<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Profile extends Model
{
    use HasFactory;

    protected $fillable = [
        'image', 'facebook', 'twitter', 'linkedin', 'about', 'user_id', "age", "gender"
    ];

    /***
     * Get image path attribute
     */
    public function getImagePathAttr()
    {
        return asset('uploads/user/', $this->image);
    }

    /**
     * Get the user that owns the Profile
     *
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function user()
    {
        return $this->belongsTo(User::class);
    }

}
