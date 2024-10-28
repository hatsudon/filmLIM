@extends('layouts.app')


@section('content')
<p>レコードセレクトページ</p>

{{-- カメラ作成ページへのリンク --}}
    <a class="btn btn-primary" href="{{ route('cameras.create') }}">カメラの追加</a>
@endsection