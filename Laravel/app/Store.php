<?php

namespace App;

use Illuminate\Database\Eloquent\Model;


//  Add fillable property into the Store Model to get around built in
//  protection mechanism against mass assignment vulnerability
//protected $fillable = ['storeNumber', 'storeName','addresses_id', 'site_id','lat', 'lon', 'cfsFlag_id'];


class Store extends Model
{
    //
    protected $fillable = [
      'storeNumber',
      'storeName',
      'addresses_id',
      'site_id',
      'lat',
      'lon',
      'cfsFlag_id'
    ];
}
