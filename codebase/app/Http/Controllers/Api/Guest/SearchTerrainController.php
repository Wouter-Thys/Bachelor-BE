<?php

namespace App\Http\Controllers\Api\Guest;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class SearchTerrainController extends Controller
{
    public function __invoke(Request $request)
    {
        ray($request);
    }
}
