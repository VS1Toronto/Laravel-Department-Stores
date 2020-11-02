<?php

namespace App\Http\Controllers;
use Illuminate\Http\Request;
use App\Addresse;

class AddressesController extends Controller
{

    public function index()
    {
        return Addresses::all();
    }

    public function show(Addresse $addresse)
    {
        return $addresse;
    }

    public function store(Request $request)
    {


    }

    public function update(Request $request, Addresse $addresse)
    {
        $addresse->update($request->all());

        return response()->json($addresse, 200);
    }

    public function delete(Addresse $addresse)
    {
        $addresse->delete();

        return response()->json(null, 204);
    }

}
