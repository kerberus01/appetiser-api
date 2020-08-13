<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Event extends Model
{
    use SoftDeletes;

    protected $table = 'events';

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     * days is Sundays To Mondays comma separated example on Sundays 1,0,0,0,0,0,0
     */
    protected $fillable = [
        'id',
        'title',
        'from',
        'to',
        'days' 
    ];

}
