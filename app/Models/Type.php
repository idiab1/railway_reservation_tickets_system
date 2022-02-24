<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Type extends Model
{
    use HasFactory;

    protected $fillable = ['name', 'train_id'];


    /**
     * Get the trian that owns the Type
     *
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function trian()
    {
        return $this->belongsTo(Train::class);
    }

}
