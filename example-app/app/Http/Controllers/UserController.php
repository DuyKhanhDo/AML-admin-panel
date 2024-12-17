<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Models\User;
use Illuminate\Http\Request;

class UserController extends Controller
{
    const PATH_VIEW = 'admins.users.';
    public function user(){
        $users = User::all();
        return view(self::PATH_VIEW . 'user', compact('users'));
    }
}
