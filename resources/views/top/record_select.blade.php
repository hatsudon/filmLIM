@extends('layouts.app')


@section('content')

{{-- カメラ作登録ページへのリンク --}}
    <a class="btn btn-primary" href="{{ route('cameras.create') }}">カメラを登録する</a>
    
{{-- 写真情報登録ページへのリンク --}}
    <a class="btn btn-primary" href="{{ route('photos.create') }}">写真の情報を登録する</a>
    
@endsection