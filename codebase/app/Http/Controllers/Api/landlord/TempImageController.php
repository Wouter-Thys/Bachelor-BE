<?php

namespace App\Http\Controllers\Api\landlord;

use App\Http\Controllers\Controller;
use App\Http\Requests\TempImageRequest;
use Illuminate\Http\Request;

class TempImageController extends Controller
{
    public function index()
    {
        //
    }

    public function store(TempImageRequest $request)
    {
        ray($request);
        ray($request->validated());
    }

    public function show($id)
    {
        //
    }

    public function update(Request $request, $id)
    {
        //
    }

    public function destroy($id)
    {
        //
    }
}
