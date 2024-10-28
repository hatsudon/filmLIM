<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Models\Camera;

class CamerasController extends Controller
{
    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $camera = new Camera;

        return view('cameras.create', [
            'camera' => $camera,
        ]);
    }
    
    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required|max:255',
            'memo' => 'max:255',
        ]);
        
        // 認証済みユーザー（閲覧者）の投稿として作成（リクエストされた値をもとに作成）
        $request->user()->cameras()->create([
            'name' => $request->name,
            'memo' => $request->memo,
        ]);
        
        // トップページへリダイレクトさせる
        return redirect('/');
    }
}
