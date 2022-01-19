<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Station extends Model
{
    use HasFactory;

    protected $fillable = ["name"];

    /**
     * Get all of the trains for the Station
     *
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     */
    public function trains()
    {
        return $this->hasMany(Train::class);
    }

}
