<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\User;

class UserController extends Controller
{
    /**
     * ユーザー一覧表示
     */
    public function show(int $id)
    {
        $user = User::findorFail($id);

        // dd($user);

        return view('users.show', compact('user'));
    }
}
