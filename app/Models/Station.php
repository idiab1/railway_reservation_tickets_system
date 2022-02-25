<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Station extends Model
{
    use HasFactory;

    protected $fillable = ["name"];

    /**
     * The trains that belong to the Station
     *
     * @return \Illuminate\Database\Eloquent\Relations\BelongsToMany
     */
    public function trains()
    {
        return $this->belongsToMany(Train::class, 'train_station');
    }

}
