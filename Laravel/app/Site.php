<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

//  Add fillable property into the Store Model to get around built in
//  protection mechanism against mass assignment vulnerability
//protected $fillable = ['site' , 'phoneNumber'];


class Site extends Model
{
    protected $fillable = [
      'site',
      'phoneNumber'
    ];
}
