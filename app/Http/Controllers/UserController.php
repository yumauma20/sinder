<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class UserController extends Controller
{
    /**
     * ユーザー一覧表示
     */
    public function show(int $id)
    {
        return view('users.show');
    }
}
