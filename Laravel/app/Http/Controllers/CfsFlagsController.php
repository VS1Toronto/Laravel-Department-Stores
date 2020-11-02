<?php

namespace App\Http\Controllers;
use Illuminate\Http\Request;
use App\CfsFlag;

class CfsFlagsController extends Controller
{

    public function index()
    {
        return CfsFlag::All();
    }

    public function show(CfsFlag $cfsFlag)
    {
        return $cfsFlag;
    }

    public function cfsFlag(Request $request)
    {
        $this->validate($request, [
        'cfsFlags' => 'string',
        ]);
        $cfsFlag = CfsFlag::create($request->all());

        return response()->json($cfsFlag, 201);
    }

    public function update(Request $request, CfsFlag $cfsFlag)
    {
        $cfsFlag->update($request->all());

        return response()->json($cfsFlag, 200);
    }

    public function delete(CfsFlag $cfsFlag)
    {
        $cfsFlag->delete();

        return response()->json(null, 204);
    }

}
