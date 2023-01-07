<?php

namespace App\Http\Controllers\Data\Users;

use App\Models\User;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class UsersController extends Controller
{
    public function index()
    {
        return response()->json(['results' => User::latest()->paginate(20)]);
    }
}
