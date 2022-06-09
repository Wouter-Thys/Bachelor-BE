<?php

namespace App\Http\Controllers\Api\User;

use App\Http\Controllers\Controller;
use Carbon\Carbon;
use Illuminate\Http\Request;

class VerifyEmailController extends Controller
{
    public function __invoke(Request $request)
    {
        $user = $request->user();
        $user->email_verified_at = Carbon::now();
        $user->save();
    }
}
