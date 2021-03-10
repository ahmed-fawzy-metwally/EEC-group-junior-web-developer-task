<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\User;
use Illuminate\Http\Request;

class UserController extends Controller
{
    /**
     * return the status if user founded or not.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return Boolean
     */
    public function checkUserFounded(Request $request)
    {
        $user = User::find($request->user);
        if (is_null($user))
            return ['status' => false];
        else
            return ['status' => true];
    }
}
