@extends('layouts.app')


@section('content')

<div class="flex flex-col sm:flex-row h-screen p-4 gap-4">
    
        {{-- 写真情報登録ページへのリンク --}}
        <a class="flex-1 p-3 text-xl font-semibold text-[#D4C5B1] bg-[#8B5A2B] hover:bg-[#A67B5B] focus:outline-none focus:ring-2 focus:ring-[#A67B5B] focus:ring-opacity-75 transition duration-300 flex items-center justify-center rounded-lg shadow-md min-h-[50vh]"
        href="{{ route('photos.create') }}">
            <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="size-6 inline">
                <path stroke-linecap="round" stroke-linejoin="round" d="m2.25 15.75 5.159-5.159a2.25 2.25 0 0 1 3.182 0l5.159 5.159m-1.5-1.5 1.409-1.409a2.25 2.25 0 0 1 3.182 0l2.909 2.909m-18 3.75h16.5a1.5 1.5 0 0 0 1.5-1.5V6a1.5 1.5 0 0 0-1.5-1.5H3.75A1.5 1.5 0 0 0 2.25 6v12a1.5 1.5 0 0 0 1.5 1.5Zm10.5-11.25h.008v.008h-.008V8.25Zm.375 0a.375.375 0 1 1-.75 0 .375.375 0 0 1 .75 0Z" />
            </svg>
            写真の情報を登録する
        </a>
        
        {{-- カメラ作登録ページへのリンク --}}
        <a class="flex-1 p-3 text-xl font-semibold text-[#D4C5B1] bg-[#6B4423] hover:bg-[#A67B5B] focus:outline-none focus:ring-2 focus:ring-[#A67B5B] focus:ring-opacity-75 transition duration-300 flex items-center justify-center rounded-lg shadow-md min-h-[50vh]"
        href="{{ route('cameras.create') }}">
            <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="size-6 inline">
              <path stroke-linecap="round" stroke-linejoin="round" d="M6.827 6.175A2.31 2.31 0 0 1 5.186 7.23c-.38.054-.757.112-1.134.175C2.999 7.58 2.25 8.507 2.25 9.574V18a2.25 2.25 0 0 0 2.25 2.25h15A2.25 2.25 0 0 0 21.75 18V9.574c0-1.067-.75-1.994-1.802-2.169a47.865 47.865 0 0 0-1.134-.175 2.31 2.31 0 0 1-1.64-1.055l-.822-1.316a2.192 2.192 0 0 0-1.736-1.039 48.774 48.774 0 0 0-5.232 0 2.192 2.192 0 0 0-1.736 1.039l-.821 1.316Z" />
            　<path stroke-linecap="round" stroke-linejoin="round" d="M16.5 12.75a4.5 4.5 0 1 1-9 0 4.5 4.5 0 0 1 9 0ZM18.75 10.5h.008v.008h-.008V10.5Z" />
            </svg>
            カメラを登録する
        </a>
        
</div>
    
@endsection