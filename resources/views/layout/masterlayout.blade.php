@include('pages.header')
    {{-- @yield('content') --}}
    @hasSection('content')
        @yield('content')
    @else
        <h2>No Content Found</h2>
    @endif

    @section('sidebar')
    @show
    @stack('scripts')
    @include('pages.footer')