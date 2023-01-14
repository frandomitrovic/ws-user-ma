<?php

namespace App\Http\Controllers\Data\Users\Updates;

use App\Http\Controllers\Controller;
use App\Http\Requests\UpdateUserPasswordRequest;
use App\Models\User;
use Illuminate\Http\Request;

class UpdatePasswordsController extends Controller
{
    public function update(UpdateUserPasswordRequest $request, User $user)
    {
        return $request->all();
    }
}
