<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Models\Photo;

use App\Models\User;

class PhotosController extends Controller
{
    //写真一覧ページへ(index)
    public function index()
    {
        $data = [];
        // 認証済みユーザーを取得
        $user = \Auth::user();
        // ユーザーの写真の一覧を作成日時の降順で取得
        $photos = $user->user_photos()->orderBy('created_at', 'desc')->paginate(10);
        $data = [
            'user' => $user,
            'photos' => $photos,
        ];
        
        return view('photos.index', $data);
    }
    
    
    //カメラ追加ページへ(create)
    public function create()
    {
        $photo = new Photo;
        
        $user = \Auth::user();
        
        $cameras = $user->cameras()->get();
        
        return view('photos.create', [
            'photo' => $photo,
            'cameras' => $cameras,
        ]);
    }
    
    //写真追加アクション
    public function store(Request $request)
    {
        $request->validate([
            'latitude' => ['required','numeric','regex:/^[-]?((([0-8]?[0-9])(\.[0-9]{6}))|90(\.0{6})?)$/'],
            'longitude' => ['required','numeric','regex:/^[-]?(((([1][0-7][0-9])|([0-9]?[0-9]))(\.[0-9]{6}))|180(\.0{6})?)$/'],
            'memo' => ['max:255'],
        ]);
        
        $photo = new Photo;
        
        $photo->camera_id = $request->camera_id;
        $photo->latitude = $request->latitude;
        $photo->longitude = $request->longitude;
        $photo->memo = $request->memo;
        
        $photo->save();
        
        return redirect('/');
    }
    
    //写真詳細ページへ(show)
    public function show(string $id)
    {
        $photo = Photo::findOrFail($id);
        
        $camera = $photo->camera;
        
        if (\Auth::id() === $camera->user_id) {
        // メッセージ詳細ビューでそれを表示
            return view('photos.show', [
                'photo' => $photo,
            ]);
        }
        else {
            return redirect('/');
        }
    }
    
    //写真編集ページへ(edit)
    public function edit(string $id)
    {
        $photo = Photo::findOrFail($id);
        
        $camera = $photo->camera;
        
        if (\Auth::id() === $camera->user_id) {
            return view('photos.edit', [
                'photo' => $photo,
            ]);
        }
        else {
            return redirect('/');
        }
    }
    
    //写真編集アクション(update)
    public function update(Request $request, string $id)
    {
        $request->validate([
            'latitude' => ['required','numeric','regex:/^[-]?((([0-8]?[0-9])(\.[0-9]{6}))|90(\.0{6})?)$/'],
            'longitude' => ['required','numeric','regex:/^[-]?(((([1][0-7][0-9])|([0-9]?[0-9]))(\.[0-9]{6}))|180(\.0{6})?)$/'],
            'memo' => ['max:255'],
        ]);
        
        $photo = Photo::findOrFail($id);
        
        $camera = $photo->camera;
        
        if (\Auth::id() === $camera->user_id) {
            $photo->latitude = $request->latitude;
            $photo->longitude = $request->longitude;
            $photo->memo = $request->memo;
            
            $photo->save();
        }

        return redirect()->route('photos.index');
    }
    
    //写真削除アクション(destroy)
    public function destroy(string $id)
    {
        $photo = Photo::findOrFail($id);
        
        $camera = $photo->camera;
        
        if (\Auth::id() === $camera->user_id) {
            $photo->delete();
        }

        return redirect()->route('photos.index');
    }
    
}
