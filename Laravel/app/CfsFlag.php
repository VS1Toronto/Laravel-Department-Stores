<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

//  Add fillable property into the Store Model to get around built in
//  protection mechanism against mass assignment vulnerability
//protected $fillable = ['cfsFlag'];


class CfsFlag extends Model
{
    protected $fillable = [
      'cfsFlag'
    ];
}
