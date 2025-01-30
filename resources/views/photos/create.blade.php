@extends('layouts.app')

@section('content')

<div class="prose ml-4">
        <h2 class="text-lg">写真の情報を登録する</h2>
    </div>

    <div class="flex justify-center">
        <form method="POST" action="{{ route('photos.store') }}" class="w-1/2">
            @csrf
                <div class="form-control my-4">
                    <label for="camera" class="label">
                        <span class="label-text">カメラを選択:</span>
                    </label>
                    <select name="camera_id" class="select select-bordered">
                        @foreach ($cameras as $camera)
                            <option value="{{ $camera->id }}" @if(old('camera_id') == $camera->id) selected @endif>{{ $camera->name }}</option>
                        @endforeach
                    </select>
                </div>
                
                <location-record></location-record>   
        </form>
        
    </div>

@endsection