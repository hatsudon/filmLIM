@extends('layouts.app')

@section('content')
    @if (Auth::check())
        @include('commons.menu')
       
        <h2 class="text-2xl">{{ $user->name }}さんのマイページ</h2>
        
        <ul class="mt-3 grid grid-cols-2 sm:grid-cols-3 md:grid-cols-4 lg:grid-cols-5 gap-4 md:gap-6 xl:gap-8">
            @foreach ($photos as $photo)
                <li class="group h-64 flex justify-end items-end bg-gray-100 overflow-hidden rounded-lg shadow-lg relative">
                        <a href="{{ route('photos.show', $photo->id) }}">
                        <img
                            src="{{ $photo->photo_url }}"
                            class="w-full h-full object-cover object-center absolute inset-0 group-hover:scale-105 transition duration-200"
                        />
                        </a>
                        <div class="absolute inset-x-0 bottom-0 h-1/6 bg-gradient-to-b from-transparent to-black">
                            <p class="text-white absolute right-4 bottom-2">{{ $photo->created_at }}</p>
                        </div>
                </li>
            @endforeach
        </ul>
        
    @else
        <div class="prose hero bg-base-200 mx-auto max-w-full rounded">
            <div class="hero-content text-center my-10">
                <div class="max-w-md mb-10">
                    <h2>Welcome to the FilmLIM!</h2>
                    {{-- ユーザー登録ページへのリンク --}}
                    <a class="btn btn-primary btn-lg normal-case" href="{{ route('register') }}">ユーザー登録はこちら</a>
                </div>
            </div>
        </div>
    @endif
@endsection