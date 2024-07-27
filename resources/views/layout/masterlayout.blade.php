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
<script>
    function checkToken() {
        token = localStorage.getItem('jwt_token');
        const currentPath = window.location.pathname;
        if (currentPath === '/form') {
            return;
        }
        if (token == '' || token == null) {
            window.location.href = '/form';
            return;
        }
    }
    checkToken();
</script>
@include('pages.footer')
