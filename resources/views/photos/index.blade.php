@extends('layouts.app')

@section('content')

@include('commons.index_select')

<div class="prose ml-4">
        <h2 class="text-lg">photo index</h2>
    </div>

    @if (isset($photos))
        <table class="table table-zebra w-full my-4">
            <thead>
                <tr>
                    <th>id</th>
                    <th>カメラ</th>
                    <th>日時</th>
                    <th>写真</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($photos as $photo)
                <tr>
                    <td><a class="link link-hover text-info" href="{{ route('photos.show', $photo->id) }}">{{ $photo->id }}</a></td>
                    <td>{{ $photo->camera->name }}</td>
                    <td>{{ $photo->created_at }}</td>
                    
                    @if(!($photo->filename == null))
                    <td><img src="{{ $photo->photo_url }}"  width="100" height="100"></td>
                    @else
                    <td><a class="btn btn-outline" href="{{ route('photos.edit', $photo->id) }}">写真を登録する</a></td>
                    @endif
                    
                </tr>
                @endforeach
            </tbody>
        </table>
    @endif
    
@endsection