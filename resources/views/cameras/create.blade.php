@extends('layouts.app')

@section('content')

<div class="prose ml-4">
        <h2 class="text-lg">カメラを登録する</h2>
    </div>

    <div class="flex justify-center">
        <form method="POST" action="{{ route('cameras.store') }}" class="w-1/2">
            @csrf

                <div class="form-control my-4">
                    <label for="content" class="label">
                        <span class="label-text">カメラの名前:</span>
                    </label>
                    <input type="text" name="name" class="input input-bordered w-full">
                </div>
                
                <div class="form-control my-4">
                    <label for="title" class="label">
                        <span class="label-text">備考:</span>
                    </label>
                    <input type="text" name="memo" class="input input-bordered w-full">
                </div>

            <button type="submit" class="btn btn-primary btn-outline">追加</button>
        </form>
    </div>

@endsection