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
        if (\Auth::check()) {
            $data = [];
            // 認証済みユーザーを取得
            $user = \Auth::user();
            // ユーザーの写真の一覧を作成日時の降順で取得
            $photos = $user->user_photos()->orderBy('created_at', 'desc')->paginate(10);
            $data = [
                'user' => $user,
                'photos' => $photos,
            ];
            
            return view('dashboard', $data);
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
