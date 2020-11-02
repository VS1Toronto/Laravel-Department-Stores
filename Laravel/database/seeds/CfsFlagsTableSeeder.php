<?php

use Illuminate\Database\Seeder;

class CfsFlagsTableSeeder extends Seeder
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
     DB::table('cfsFlags')->delete();
     //factory(App\Store::class)->create();

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

     //  Cfs Flag fields needed
     foreach ($storefeedsxml->store as $store)
     {
         // Create  Stores records
         DB::table('cfsFlags')->insert([
           'cfsFlag' => $store->cfsFlag
         ]);
     }


     //   Initial test seeds used before feed was brought in just kept as part of the building documentation
     /*

     // Create 4 initial Stores records
     DB::table('cfsFlags')->insert([
       'cfsFlag' => 'Y'
     ]);

     DB::table('cfsFlags')->insert([
       'cfsFlag' => 'Y'
     ]);

     DB::table('cfsFlags')->insert([
       'cfsFlag' => 'Y'
     ]);

     DB::table('cfsFlags')->insert([
       'cfsFlag' => 'Y'
     ]);

     */

     // supposed to only apply to a single connection and reset it's self
     // but I like to explicitly undo what I've done for clarity
     DB::statement('SET FOREIGN_KEY_CHECKS=1;');
     }
}
