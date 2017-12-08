<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Champion extends Model
{
    protected $hidden = [
        'created_at', 'updated_at', 'riot_id'
    ];
}
