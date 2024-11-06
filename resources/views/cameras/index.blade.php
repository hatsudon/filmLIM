@extends('layouts.app')

@section('content')

@include('commons.index_select')

<div class="prose ml-4">
        <h2 class="text-lg">カメラ一覧</h2>
    </div>

    @if (isset($cameras))
        <table class="table table-zebra w-full my-4">
            <thead>
                <tr>
                    <th>id</th>
                    <th>カメラの名前</th>
                    <th>備考</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($cameras as $camera)
                <tr>
                    <td><a class="link link-hover text-info" href="{{ route('cameras.show', $camera->id) }}">{{ $camera->id }}</a></td>
                    <td>{{ $camera->name }}</td>
                    <td>{{ $camera->memo }}</td>
                </tr>
                @endforeach
            </tbody>
        </table>
    @endif
    
@endsection