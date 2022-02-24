<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Train extends Model
{
    use HasFactory;

    protected $fillable = [
        'name', 'depature_at', 'arrival_at', 'status',
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

    /**
     * Get the type associated with the Train
     *
     * @return \Illuminate\Database\Eloquent\Relations\HasOne
     */
    public function type()
    {
        return $this->hasOne(Type::class);
    }

}
