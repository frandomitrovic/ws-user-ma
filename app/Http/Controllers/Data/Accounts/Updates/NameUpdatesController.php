<?php

namespace App\Http\Controllers\Data\Accounts\Updates;

use App\Http\Controllers\Controller;
use App\Http\Requests\UpdateUserNameRequest;
use App\Models\User;

class NameUpdatesController extends Controller
{
    public function update(UpdateUserNameRequest $request, User $user)
    {
        $user->update($request->validated());

        return response()->json(['user' => $user->only('id', 'name', 'email', 'role')]);
    }
}
