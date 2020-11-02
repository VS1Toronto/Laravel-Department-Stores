<?php

use Illuminate\Database\Seeder;

class AddressesTableSeeder extends Seeder
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
     DB::table('addresses')->delete();


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

     //  Stores fields needed
     foreach ($storefeedsxml->store as $store)
     {
         // Create  Stores records
         DB::table('addresses')->insert([
           'address_line_1' => $store->address->address_line_1,
           'address_line_2' => $store->address->address_line_2,
           'address_line_3' => $store->address->address_line_3,
           'city' => $store->address->city,
           'county' => $store->address->county,
           'country' => $store->address->country,
           'postcode' => $store->address->postcode
         ]);

         $i++;
     }


     //   Initial test seeds used before feed was brought in just kept as part of the building documentation
	 /*

     // Create 4 initial Stores records
     DB::table('addresses')->insert([
       'addressLine_1' => 'Debenhams Retail plc',
       'addressLine_2' => 'The Square',
       'addressLine_3' => 'Tallaght',
       'city' => 'Tallaght',
       'county' => 'Dublin',
       'country' => 'Republic of Ireland',
       'postcode' => 'D24 YFT9'
     ]);

     DB::table('addresses')->insert([
       'addressLine_1' => 'Debenhams Retail plc',
       'addressLine_2' => '41-44 Blue Boar Row',
       'address_line_3' => '',
       'city' => 'Salisbury',
       'county' => 'Wiltshire',
       'country' => 'United Kingdom',
       'postcode' => 'SP1 1DE'
     ]);

     DB::table('addresses')->insert([
       'addressLine_1' => 'Debenhams Retail plc',
       'addressLine_2' => '13-15 Kingsmead Centre',
       'addressLine_3' => '',
       'city' => 'Farnborough',
       'county' => 'Hampshire',
       'country' => 'United Kingdom',
       'postcode' => 'GU14 7SJ'
     ]);

     DB::table('addresses')->insert([
       'addressLine_1' => 'Debenhams Retail plc',
       'addressLine_2' => '113 High Street',
       'addressLine_3' => '',
       'city' => 'Eltham',
       'county' => 'London',
       'country' => 'United Kingdom',
       'postcode' => 'SE9 1TQ'
     ]);

	*/



     // supposed to only apply to a single connection and reset it's self
     // but I like to explicitly undo what I've done for clarity
     DB::statement('SET FOREIGN_KEY_CHECKS=1;');
     }
}
