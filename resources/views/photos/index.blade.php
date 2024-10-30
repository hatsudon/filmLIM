@extends('layouts.app')

@section('content')

<div class="prose ml-4">
        <h2 class="text-lg">photo index</h2>
    </div>

    @if (isset($photos))
        <table class="table table-zebra w-full my-4">
            <thead>
                <tr>
                    <th>id</th>
                    <th>カメラid</th>
                    <th>日時</th>
                    <th>写真</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($photos as $photo)
                <tr>
                    <td><a class="link link-hover text-info" href="{{ route('photos.show', $photo->id) }}">{{ $photo->id }}</a></td>
                    <td>{{ $photo->camera_id }}</td>
                    <td>{{ $photo->created_at }}</td>
                    <td>{{ $photo->filename }}</td>
                </tr>
                @endforeach
            </tbody>
        </table>
    @endif
    
@endsection