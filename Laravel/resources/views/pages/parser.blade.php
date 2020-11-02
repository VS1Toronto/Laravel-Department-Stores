<?php

// //  xml array
$storefeedsxml = [];

//  The url to get the feed
$lines = 'http://retailtwo.nn4m.co.uk/debenhams/web/content/feedFiles/unprocessed/stores.xml.gz';

    // This does exactly what the line of code below it does and I just cant through it away
    //$lines = 'http://retailtwo.nn4m.co.uk/debenhams/web/content/feedFiles/unprocessed/stores.xml.gz';
    //$zd = gzopen($lines, "r");
    //$return = gzread($zd, 10000);
    //gzclose($zd);


    //  These are the two lines that opened the file with the xml.gz extension
    $return = file_get_contents('compress.zlib://'.$lines);

    $feed = simplexml_load_string($return,  "SimpleXMLElement", LIBXML_NOERROR |  LIBXML_ERR_NONE);

    //  This populate the array $storefeedsxml
    for($i = 0; $i < $storefeedsxml; $i++)
    {
        $storefeedsxml = $feed;
    }

    //$xml = simplexml_load_string($return);
    var_dump($return);

    //  This gives the first complete
    var_dump($storefeedsxml->store[0]);



    //  Stores fields needed
    foreach ($storefeedsxml->store as $store)
    {
        echo $store->number;
        echo "</br>";
        echo $store->name;
        echo "</br>";
        echo $store->coordinates->lat;
        echo "</br>";
        echo $store->coordinates->lon;
        echo "</br>";
        echo "</br>";
    }

    //  Addresses fields needed
    foreach ($storefeedsxml->store as $store)
    {
        echo $store->address->address_line_1;
        echo "</br>";
        echo $store->address->address_line_2;
        echo "</br>";
        echo $store->address->address_line_3;
        echo "</br>";
        echo $store->address->city;
        echo "</br>";
        echo $store->address->county;
        echo "</br>";
        echo $store->address->country;
        echo "</br>";
        echo $store->address->postcode;
        echo "</br>";
        echo "</br>";
    }

    //  Sites fields needed
    foreach ($storefeedsxml->store as $store)
    {
        echo $store->siteid;
        echo "</br>";
        echo $store->phone_number;
        echo "</br>";
        echo "</br>";
        echo "</br>";
    }

    //  Cfs Flag fields needed
    foreach ($storefeedsxml->store as $store)
    {
        echo $store->cfs_flag;
        echo "</br>";
        echo "</br>";
    }


    var_dump($storefeedsxml->store[0]->number[0]);

    var_dump($storefeedsxml->store[1]);


    var_dump($storefeedsxml);


    //  Code will not process past this point if activated
    //die();

?>
