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
                
                <div class="form-control my-4">
                    <label for="latitude" class="label">
                        <span class="label-text">緯度:</span>
                    </label>
                    <input type="text" placeholder="11.111111(小数点以下6桁)" name="latitude" class="input input-bordered w-full">
                </div>
                
                <div class="form-control my-4">
                    <label for="longitude" class="label">
                        <span class="label-text">経度:</span>
                    </label>
                    <input type="text" placeholder="111.111111(小数点以下6桁)" name="longitude" class="input input-bordered w-full">
                </div>
                
                
                <div class="form-control my-4">
                    <label for="memo" class="label">
                        <span class="label-text">備考:</span>
                    </label>
                    <input type="text" name="memo" class="input input-bordered w-full">
                </div>

            <button type="submit" class="btn btn-primary btn-outline">追加</button>
        </form>
    </div>

@endsection