<div class="tabs tabs-boxed tabs-lg">
    {{-- photos indexタブ --}}
    <a href="{{ route('photos.index') }}" class="tab grow {{ Request::routeIs('photos.index') ? 'tab-active' : '' }}">
        photo
    </a>
    {{--cameras indexタブ --}}
    <a href="{{ route('cameras.index') }}" class="tab grow {{ Request::routeIs('cameras.index') ? 'tab-active' : '' }}">
        camera
    </a>
</div>