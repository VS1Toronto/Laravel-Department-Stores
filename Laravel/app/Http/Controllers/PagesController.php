<?php

namespace App\Http\Controllers;
use Illuminate\Support\Facades\DB;
use Illuminate\Http\Request;
use App\http\Requests;
use App\Page;
use App\Store;
use App\Addresse;
use App\Site;
use App\CfsFlag;

class PagesController extends Controller
{


    public function home()
    {
        return view('pages.home');
    }

    public function about()
    {
        return view('pages.about');
    }

    public function contact()
    {
        return view('pages.contact');
    }

    public function results()
    {
        return view('pages.results');
    }

    public function storeNames()
    {
        $returnValue = "1";

        $stores = Store::all();
        return view('stores.allStores')->with('stores' , $stores);
    }

    public function storeAddresses()
    {
        $returnValue = "2";

        $addresses = Addresse::all();
        return view('stores.storeAddresses')->with('addresses' , $addresses);
    }

    public function storePhoneNumbers()
    {

        $returnValue = "3";

        $sites = Site::all();
        return view('stores.storePhoneNumbers')->with('sites' , $sites);
    }

    public function storeSites()
    {
        $returnValue = "4";

        $sites = Site::all();
        return view('stores.allSites')->with('sites' , $sites);
    }

    public function storeCfsFlags()
    {
      $returnValue = "5";
	  
	  $cfsFlags = CfsFlag::all();
      return view('stores.allCfsFlags')->with('cfsFlags' , $cfsFlags);
    }

}
