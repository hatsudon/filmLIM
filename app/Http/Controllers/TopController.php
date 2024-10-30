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
            // 認証済みユーザーを取得
            $user = \Auth::user();
            
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
