@extends('layouts.app')

@section('content')

<div class="prose ml-4">
        <h2>id = {{ $camera->id }} のカメラ詳細ページ</h2>
    </div>

    <table class="table w-full my-4">
        <tr>
            <th>カメラの名前</th>
            <td>{{ $camera->name }}</td>
        </tr>
        
        <tr>
            <th>備考</th>
            <td>{{ $camera->memo }}</td>
        </tr>
    </table>
    
    {{-- カメラ編集ページへのリンク --}}
    <a class="btn btn-outline" href="{{ route('cameras.edit', $camera->id) }}">このカメラの情報を変更</a>
    
    {{-- カメラ削除フォーム --}}
    <form method="POST" action="{{ route('cameras.destroy', $camera->id) }}" class="my-2">
        @csrf
        @method('DELETE')
        
        <button type="submit" class="btn btn-error btn-outline" 
            onclick="return confirm('id = {{ $camera->id }} のカメラを削除します。よろしいですか？')">削除</button>
    </form>

@endsection