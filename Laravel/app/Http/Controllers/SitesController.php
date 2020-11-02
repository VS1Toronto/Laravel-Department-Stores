<?php

namespace App\Http\Controllers;
use Illuminate\Http\Request;
use App\Site;

class SitesController extends Controller
{

    public function index()
    {
        return Site::all();
    }

    public function show(Site $site)
    {
        return $site;
    }

    public function addresse(Request $request)
    {
        $this->validate($request, [
        'site' => 'string',
        ]);
        $site = Site::create($request->all());

        return response()->json($site, 201);
    }

    public function update(Request $request, Site $site)
    {
        $site->update($request->all());

        return response()->json($site, 200);
    }

    public function delete(Site $site)
    {
        $site->delete();

        return response()->json(null, 204);
    }

}
