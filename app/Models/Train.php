<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Train extends Model
{
    use HasFactory;

    protected $fillable = [
        'name', 'train_type', 'depature_at', 'arrival_at', 'status',
        'depature_station', 'arrival_station', 'seats_count', 'station_id'
    ];

    protected $casts = ['depature_at', 'arrival_at'];

    /**
     * Get the station that owns the Train
     *
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function station()
    {
        return $this->belongsTo(Station::class);
    }

    // /**
    //  * Get all of the types for the Train
    //  *
    //  * @return \Illuminate\Database\Eloquent\Relations\HasMany
    //  */
    // public function types()
    // {
    //     return $this->hasMany(Type::class);
    // }

}
