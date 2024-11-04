@extends('layouts.app')

@section('content')

 <div class="prose ml-4">
        <h2 class="text-lg">id: {{ $photo->id }} の写真編集ページ</h2>
    </div>

    <div class="flex justify-center">
        <form method="POST" action="{{ route('photos.update', $photo->id) }}" enctype="multipart/form-data"　class="w-1/2">
            @csrf
            @method('PUT')

                <div class="form-control my-4">
                    <label for="latitude" class="label">
                        <span class="label-text">緯度:</span>
                    </label>
                    <input type="text" placeholder="11.111111(小数点以下6桁)" name="latitude" value="{{ $photo->latitude }}" class="input input-bordered w-full">
                </div>
                
                <div class="form-control my-4">
                    <label for="longitude" class="label">
                        <span class="label-text">経度:</span>
                    </label>
                    <input type="text" placeholder="111.111111(小数点以下6桁)" name="longitude" value="{{ $photo->longitude }}" class="input input-bordered w-full">
                </div>
                
                <div class="form-control my-4">
                    <label for="memo" class="label">
                        <span class="label-text">備考:</span>
                    </label>
                    <input type="text" name="memo" value="{{ $photo->memo }}" class="input input-bordered w-full">
                </div>
                
                <div class="form-control my-4">
                    <input type="file" name="file">
                </div>
                
                

            <button type="submit" class="btn btn-primary btn-outline">変更</button>
        </form>
    </div>

@endsection