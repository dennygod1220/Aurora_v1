<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class prize_list extends Model
{
    //
    protected $fillable = [
        'win_name','win_email','win_date'
    ];
}
