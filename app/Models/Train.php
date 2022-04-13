<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Train extends Model
{
    use HasFactory;

    protected $fillable = [
        'name', 'depature_at', 'arrival_at', 'status', 'type_id',
        'seats_count', 'depature_station', 'arrival_station', "price",
    ];

    protected $dates = ['depature_at', 'arrival_at'];

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
     * Get all of the reservations for the Train
     *
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     */
    public function reservations()
    {
        return $this->hasMany(Reservation::class);
    }

    /**
     * Get the type associated with the Train
     *
     * @return \Illuminate\Database\Eloquent\Relations\HasOne
     */
    public function type()
    {
        return $this->belongsTo(Type::class);
    }

}
