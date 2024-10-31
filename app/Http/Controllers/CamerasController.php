<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Models\Camera;

class CamerasController extends Controller
{
    //カメラ一覧ページへ(index)
    public function index()
    {
        $data = [];
        if (\Auth::check()) {
            // 認証済みユーザーを取得
            $user = \Auth::user();
            // ユーザーの投稿の一覧を作成日時の降順で取得
            $cameras = $user->cameras()->orderBy('created_at', 'desc')->paginate(10);
            $data = [
                'user' => $user,
                'cameras' => $cameras,
            ];
        }
        
        return view('cameras.index', $data);
    }
    
    
    //カメラ追加ページへ(create)
    public function create()
    {
        $camera = new Camera;

        return view('cameras.create', [
            'camera' => $camera,
        ]);
    }
    
    //カメラ追加アクション
    public function store(Request $request)
    {
        $request->validate([
            'name' => ['required','max:255'],
            'memo' => ['max:255'],
        ]);
        
        // 認証済みユーザー（閲覧者）のカメラとして作成（リクエストされた値をもとに作成）
        $request->user()->cameras()->create([
            'name' => $request->name,
            'memo' => $request->memo,
        ]);
        
        return redirect('/');
    }
    
    //カメラ詳細ページへ(show)
    public function show(string $id)
    {
        $camera = Camera::findOrFail($id);
        
        if (\Auth::id() === $camera->user_id) {
        // メッセージ詳細ビューでそれを表示
            return view('cameras.show', [
                'camera' => $camera,
            ]);
        }
        else {
            return redirect('/');
        }
    }
    
    //カメラ編集ページへ(edit)
    public function edit(string $id)
    {
        $camera = Camera::findOrFail($id);

        if (\Auth::id() === $camera->user_id) {
            return view('cameras.edit', [
                'camera' => $camera,
            ]);
        }
        else {
            return redirect('/');
        }
    }

    //カメラ編集アクション(update)
    public function update(Request $request, string $id)
    {
        $request->validate([
            'name' => ['required','max:255'],
            'memo' => ['max:255'],
        ]);
        
        $camera = Camera::findOrFail($id);
        
        if (\Auth::id() === $camera->user_id) {
        // メッセージを更新
        $camera->name = $request->name;
        $camera->memo = $request->memo;
        $camera->save();
        }
        
        return redirect()->route('cameras.index');
    }

    //カメラ削除アクション(destroy)
    public function destroy(string $id)
    {
        $camera = Camera::findOrFail($id);
        
        if (\Auth::id() === $camera->user_id) {
            $camera->delete();
        }
        
        return redirect()->route('cameras.index');
    }
}
