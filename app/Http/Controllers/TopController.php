<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use Illuminate\Support\Facades\Auth;
use App\Models\User;

class TopController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        //$data = [];
        if (\Auth::check()) { // 認証済みの場合
            // 認証済みユーザーを取得
            $user = \Auth::user();
            // ユーザーの投稿の一覧を作成日時の降順で取得
            //$tasks = $user->cameras()->orderBy('created_at', 'desc')->paginate(10);
            //$data = [
                //'user' => $user,
                //'cameras' => $cameras,
            //];
            
            return view('dashboard', [
            'user' => $user,
            ]);
        }
        
        else {
        return view('dashboard');
        }
    }
    
    public function record_select()
    {
        return view('top.record_select');
    }
    
}
