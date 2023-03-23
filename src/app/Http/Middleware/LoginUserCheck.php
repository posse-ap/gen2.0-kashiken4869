<?php

namespace App\Http\Middleware;

use Closure;
use Auth;

class LoginUserCheck
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure  $next
     * @return mixed
     */
    public function handle($request, Closure $next)
    {
        //ログインユーザーのroleを取得
        $user_role = Auth::user()->role_id;

        //ログイン者とカート情報作成者が一致しなければ別のページにリダイレクト
        if ($user_role != 1) {

            return redirect('/top')->with('auth_message', 'ページ閲覧の権限がありません。');
        }

        return $next($request);
    }
}
