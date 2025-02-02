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
        <div class="prose hero bg-[#F2E8DC] mx-auto max-w-full rounded">
            
            <div class="hero-content text-center my-10">
                <div class="max-w-md mb-10">
                    <p class="text-xl text-[#5C4033] mb-8">フイルムカメラの撮影記録アプリケーション</p>
                    <h1 class="text-5xl font-serif text-[#5C4033] mb-4">FilmLIM</h1>
                    {{-- ユーザー登録ページへのリンク --}}
                    <a class="no-underline bg-[#8B7D6B] text-[#F2E8DC] px-8 py-3 rounded-full inline-block hover:bg-[#5C4033] transition-colors" 
                     href="{{ route('register') }}">
                     今すぐ始める
                    </a>
                </div>
            </div>
        </div>
        
        <div class="py-20">
            <h2 class="text-3xl font-bold text-[#5C4033] text-center mb-12">主な機能</h2>
            <div class="grid grid-cols-1 md:grid-cols-3 gap-8">
                <div class="bg-[#D4C5B1] p-6 rounded-lg film-border">
                    <h3 class="text-xl text-[#5C4033] font-bold mb-4">日時と位置情報の記録</h3>
                    <p class="text-sm text-[#5C4033]">撮影した場所を記録します</p>
                </div>
                <div class="bg-[#D4C5B1] p-6 rounded-lg film-border">
                    <h3 class="text-xl text-[#5C4033] font-bold mb-4">アルバム機能</h3>
                    <p class="text-sm text-[#5C4033]">現像した写真のデータをアップロードすることで、撮影した写真の情報を一覧で確認できます</p>
                </div>
                <div class="bg-[#D4C5B1] p-6 rounded-lg film-border">
                    <h3 class="text-xl text-[#5C4033] font-bold mb-4">カメラ管理</h3>
                    <p class="text-sm text-[#5C4033]">使っているカメラの情報を記録します</p>
                </div>
            </div>
        </div>
        
    @endif
@endsection