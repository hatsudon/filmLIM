@extends('layouts.app')

@section('content')

 <div class="prose ml-4">
        <h2 class="text-lg">id: {{ $camera->id }} のカメラ編集ページ</h2>
    </div>

    <div class="flex justify-center">
        <form method="POST" action="{{ route('cameras.update', $camera->id) }}" class="w-1/2">
            @csrf
            @method('PUT')

                <div class="form-control my-4">
                    <label for="latitude" class="label">
                        <span class="label-text">カメラの名前:</span>
                    </label>
                    <input type="text" name="name" value="{{ $camera->name }}" class="input input-bordered w-full">
                </div>
                
                <div class="form-control my-4">
                    <label for="memo" class="label">
                        <span class="label-text">備考:</span>
                    </label>
                    <input type="text" name="memo" value="{{ $camera->memo }}" class="input input-bordered w-full">
                </div>

            <button type="submit" class="btn btn-primary btn-outline">変更</button>
        </form>
    </div>

@endsection