<?php

namespace App\Http\Controllers\Api\User;

use App\Enums\ApprovalStatusEnum;
use App\Http\Controllers\Controller;
use App\Http\Resources\RentTerrainResource;
use Carbon\Carbon;
use Illuminate\Http\Request;

class ApprovedRentTerrainController extends Controller
{
    public function index(Request $request)
    {
        return RentTerrainResource::collection($request->user()->rentTerrains()->where('approvalStatus',
            ApprovalStatusEnum::APPROVED)->where('startDate', ">", Carbon::now())->orderBy('startDate',
            'asc')->get());
    }

    public function store(Request $request)
    {
        //
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
