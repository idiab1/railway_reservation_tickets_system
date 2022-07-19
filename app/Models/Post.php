<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Post extends Model
{
    use HasFactory;

    use SoftDeletes;

    protected $fillable = [
        'name', 'slug', 'content', 'image', 'user_id'
    ];

    protected $appends = ["image_path"];

    // Get the path of image
    public function getImagePathAttribute(){
        return asset("uploads/posts/" . $this->image);
    }
    protected $dates = ['deleted_at'];

    /**
     * Get the user that owns the Post
     *
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function user()
    {
        return $this->belongsTo(User::class);
    }

}
