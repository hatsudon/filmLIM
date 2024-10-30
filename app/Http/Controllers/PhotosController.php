<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Models\Photo;

use App\Models\User;

class PhotosController extends Controller
{
    public function index()
    {
        $data = [];
        if (\Auth::check()) { // 認証済みの場合
            // 認証済みユーザーを取得
            $user = \Auth::user();
            // ユーザーの投稿の一覧を作成日時の降順で取得
            $photos = $user->user_photos()->orderBy('created_at', 'desc')->paginate(10);
            $data = [
                'user' => $user,
                'photos' => $photos,
            ];
        }
        
        // dashboardビューでそれらを表示
        return view('photos.index', $data);
    }
    
    
    /**
     * 写真の追加ページへ遷移
     */
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
    
     /**
     * 写真追加アクション
     */
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
        
        // トップページへリダイレクトさせる
        return redirect('/');
    }
    
    /**
     * 写真情報詳細
     */
    public function show(string $id)
    {
        $photo = Photo::findOrFail($id);
        
        //if (\Auth::id() === $photo->user_id) {
        // メッセージ詳細ビューでそれを表示
            return view('photos.show', [
                'photo' => $photo,
            ]);
        //}
        //else {
           // return redirect('/');
        //}
    }
    
    /**
     * 写真情報変更ページへ遷移
     */
    public function edit(string $id)
    {
        $photo = Photo::findOrFail($id);

        //if (\Auth::id() === $task->user_id) {
            return view('photos.edit', [
                'photo' => $photo,
            ]);
        //}
        //else {
            //return redirect('/');
        //}
    }
    
    /**
     * 写真変更アクション
     */
    public function update(Request $request, string $id)
    {
        $request->validate([
            'latitude' => ['required','numeric','regex:/^[-]?((([0-8]?[0-9])(\.[0-9]{6}))|90(\.0{6})?)$/'],
            'longitude' => ['required','numeric','regex:/^[-]?(((([1][0-7][0-9])|([0-9]?[0-9]))(\.[0-9]{6}))|180(\.0{6})?)$/'],
            'memo' => ['max:255'],
        ]);
        
        $photo = Photo::findOrFail($id);
        
        //if (\Auth::id() === $task->user_id) {
        $photo->latitude = $request->latitude;
        $photo->longitude = $request->longitude;
        $photo->memo = $request->memo;
        
        $photo->save();
        //}

        return redirect('/');
    }
    
    /**
     * 写真削除アクション
     */
    public function destroy(string $id)
    {
        $photo = Photo::findOrFail($id);
        
        //if (\Auth::id() === $task->user_id) {
            $photo->delete();
        //}

        return redirect('/');
    }
    
}
