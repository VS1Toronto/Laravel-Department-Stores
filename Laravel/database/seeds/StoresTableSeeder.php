<?php

use Illuminate\Database\Seeder;
use App\Store;

class StoresTableSeeder extends Seeder
{
  /**
   * Run the database seeds.
   *
   * @return void
   */
   public function run()
   {
     Eloquent::unguard();

     //disable foreign key check for this connection before running seeders
     DB::statement('SET FOREIGN_KEY_CHECKS=0;');

      //$this->call(StoresTableSeeder::class);
     DB::table('stores')->delete();


     // //  xml arrsy
     $storefeedsxml = [];

     //  The url to get the feed
     $lines = 'http://retailtwo.nn4m.co.uk/debenhams/web/content/feedFiles/unprocessed/stores.xml.gz';

     //  These are the two lines that opened the file with the xml.gz extension
     $return = file_get_contents('compress.zlib://'.$lines);
     $feed = simplexml_load_string($return,  "SimpleXMLElement", LIBXML_NOERROR |  LIBXML_ERR_NONE);

     //  This populate the array $storefeedsxml
     for($i = 0; $i < $storefeedsxml; $i++)
     {
         $storefeedsxml = $feed;
     }


     $i = 1;
     settype($i, "integer"); // $i is now definitly an integer

     //  Addresses fields needed
     foreach ($storefeedsxml->store as $store)
     {

         // Create  Stores records
         DB::table('stores')->insert([
           'storeNumber' => $store->number,
           'storeName' => $store->name,
           'addresses_id' => $i,
           'site_id' => $i,
           'lat' => $store->coordinates->lat,
           'lon' => $store->coordinates->lon,
           'cfsFlag_id' => $i
         ]);

         $i++;
     }


     //   Initial test seeds used before feed was brought in just kept as part of the building documentation
     /*

     // Create 4 initial Stores records
     DB::table('stores')->insert([
       'storeNumber' => '214',
       'storeName' => 'Tallaght',
       'addresses_id' => '1',
       'site_id' => '1',
       'lat' => '53.286706',
       'lon' => '-6.371848',
       'cfsFlag_id' => '1'
     ]);

     DB::table('stores')->insert([
       'storeNumber' => '225',
       'storeName' => 'Salisbury',
       'addresses_id' => '2',
       'site_id' => '2',
       'lat' => '51.070060',
       'lon' => '-1.795280',
       'cfsFlag_id' => '1'
     ]);

     DB::table('stores')->insert([
       'storeNumber' => '182',
       'storeName' => 'Farnborough',
       'addresses_id' => '3',
       'site_id' => '2',
       'lat' => '51.291750',
       'lon' => '-0.754270',
       'cfsFlag_id' => '1'
     ]);

     DB::table('stores')->insert([
       'storeNumber' => '206',
       'storeName' => 'Eitham',
       'addresses_id' => '4',
       'site_id' => '2',
       'lat' => '51.450940',
       'lon' => '0.055400',
       'cfsFlag_id' => '1'
     ]);

     */

     // supposed to only apply to a single connection and reset it's self
     // but I like to explicitly undo what I've done for clarity
     DB::statement('SET FOREIGN_KEY_CHECKS=1;');
     }
}
