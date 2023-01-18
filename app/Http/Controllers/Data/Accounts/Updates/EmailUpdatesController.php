<?php

namespace App\Http\Controllers\Data\Accounts\Updates;

use App\Http\Controllers\Controller;
use App\Http\Requests\UpdateUserEmailRequest;
use App\Models\User;

class EmailUpdatesController extends Controller
{
    public function update(UpdateUserEmailRequest $request, User $user)
    {
        $user->update($request->validated());

        return response()->json(['user' => $user->only('id', 'name', 'email', 'role')]);
    }
}
