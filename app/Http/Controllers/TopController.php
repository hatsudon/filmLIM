<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class TopController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        //$data = [];
        //if (\Auth::check()) { // 認証済みの場合
            // 認証済みユーザーを取得
            //$user = \Auth::user();
            // ユーザーの投稿の一覧を作成日時の降順で取得
            //$tasks = $user->cameras()->orderBy('created_at', 'desc')->paginate(10);
            //$data = [
                //'user' => $user,
                //'cameras' => $cameras,
            //];
        //}
        
        // dashboardビューでそれらを表示
        return view('dashboard');
    }
    
    public function record_select()
    {
        return view('record.record_select');
    }
    public function photo_index()
    {
        return view('index.photo_index');
    }
}
