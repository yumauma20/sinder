<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Constant\Status;
use App\Reaction;
use App\User;
use Auth;

class MatchingController extends Controller
{
    /**
     * マッチングしたユーザーを取得する
     */
    public static function index()
    {
        // 自分をLIKEしたユーザーIDのみ抽出
        $got_reaction_ids = Reaction::where([
            ['to_user_id', Auth::id()], // to_user_idは自分
            ['status', Status::LIKE]
            ])->pluck('from_user_id');

        // whereinで自分をLIKEしたユーザーから自分がLIKEしたユーザーIDを絞り込み取得
        // 今回はfrom_user_idが自分
        $matching_ids = Reaction::whereIn('to_user_id', $got_reaction_ids)
        ->where('status', Status::LIKE)
        ->where('from_user_id', Auth::id())
        ->pluck('to_user_id');

        $matching_users = User::whereIn('id', $matching_ids)->get();
        
        $match_users_count = count($matching_users);

        return view('users.index', compact('matching_users', 'match_users_count'));
    }
}
