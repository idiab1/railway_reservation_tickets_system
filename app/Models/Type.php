<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Type extends Model
{
    use HasFactory;

    protected $fillable = ["name"];


    /**
     * Get the train that owns the Type
     *
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function train()
    {
        return $this->hasOne(Train::class);
    }

}
