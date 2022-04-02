<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Reservation extends Model
{
    use HasFactory;

    protected $fillable = [ "user_id", "train_id", "date_reserve"];

    protected $cats = [
        "date_reserve" => 'datetime:Y-m-d H:00',
    ];

}
