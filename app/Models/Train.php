<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Train extends Model
{
    use HasFactory;

    protected $fillable = [
        'name', 'depature_at', 'arrival_at', 'status', 'train_type',
        'depature_station', 'arrival_station', 'seats_count'
    ];

    protected $casts = ['depature_at', 'arrival_at'];

    /**
     * The station that belong to the Train
     *
     * @return \Illuminate\Database\Eloquent\Relations\BelongsToMany
     */
    public function stations()
    {
        return $this->belongsToMany(Station::class, 'train_station');
    }

    /**
     * Get the type associated with the Train
     *
     * @return \Illuminate\Database\Eloquent\Relations\HasOne
     */
    // public function type()
    // {
    //     return $this->hasOne(Type::class);
    // }

}
