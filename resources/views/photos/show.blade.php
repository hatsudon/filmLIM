@extends('layouts.app')

@section('content')
<div class="prose ml-4">
        <h2>id = {{ $photo->id }} の写真詳細ページ</h2>
    </div>

    <table class="table w-full my-4">
        <tr>
            <th>カメラ</th>
            <td>{{ $photo->camera->name }}</td>
        </tr>
        
        <tr>
            <th>日時</th>
            <td>{{ $photo->created_at }}</td>
        </tr>

        <tr>
            <th>緯度</th>
            <td>{{ $photo->latitude }}</td>
        </tr>
        
        <tr>
            <th>経度</th>
            <td>{{ $photo->longitude }}</td>
        </tr>
        
        <tr>
            <th>地図</th>
            <td>
                <show-map latitude=@json($photo->latitude) longitude=@json($photo->longitude)></show-map>
                
                
	        </td>
        </tr>
        
        <tr>
            <th>備考</th>
            <td>{{ $photo->memo }}</td>
        </tr>
        
        @if(!($photo->filename == null))
            <tr>
                <th>写真</th>
                <td>
                    <a href="{{ $photo->photo_url }}">
                    <img src="{{ $photo->photo_url }}"  width="200" height="200">
                    </a>
                </td>
            </tr>
        @else
            <tr>
                <th>写真</th>
                <td>写真は登録されていません</td>
            </tr>
        @endif
        
    </table>
    
    {{-- 写真編集ページへのリンク --}}
    <a class="btn btn-outline" href="{{ route('photos.edit', $photo->id) }}">この写真の情報を変更</a>
    
    {{-- 写真削除フォーム --}}
    <form method="POST" action="{{ route('photos.destroy', $photo->id) }}" class="my-2">
        @csrf
        @method('DELETE')
        
        <button type="submit" class="btn btn-error btn-outline" 
            onclick="return confirm('id = {{ $photo->id }} の写真を削除します。よろしいですか？')">削除</button>
    </form>

@endsection