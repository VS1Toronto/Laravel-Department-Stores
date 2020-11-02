<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

//  Add fillable property into the Store Model to get around built in
//  protection mechanism against mass assignment vulnerability
//protected $fillable = ['address_line_1', 'address_line_2', 'address_line_3' 'city', 'county', 'country', 'postcode'];


class Addresse extends Model
{
    protected $fillable = [
      'address_line_1',
      'address_line_2',
      'address_line_3',
      'city',
      'county',
      'country',
      'postcode'
    ];
}
