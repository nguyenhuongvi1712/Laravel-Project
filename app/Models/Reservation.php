<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Reservation extends Model
{
    use HasFactory;
    protected $fillable = [
        'date',
        'time',
        'name',
        'number_of_people',
        'tel',
        'note',
        'user_id',
        'status'
    ];
}
