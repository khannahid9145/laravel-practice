@extends('layout.masterlayout')
@section('content')

<a href="/layoutDesign" class="btn btn-secondary">Design Layout Page</a>
<a href="{{ route('alldata') }}" class="btn btn-secondary">Page Control alldata</a>
<a href="{{ route('home') }}" class="btn btn-secondary">Page Control</a>

    <p>Hello Layout</p>
    <h5>Lorem ipsum dolor, sit amet consectetur adipisicing elit. Corrupti repudiandae non facere similique eos veniam
        consectetur voluptate consequuntur, sit vitae, eum numquam illum nihil a repellat placeat nisi est! Cumque ex error
        nemo amet illum fuga quia ad delectus saepe illo perferendis nostrum quos quo tempora, culpa voluptates consequuntur
        ipsa? Eum corporis harum doloribus eius velit non sequi, esse nisi rerum dicta cupiditate debitis dolorum enim vitae
        porro itaque recusandae quidem, accusantium ratione incidunt iste fuga unde excepturi. Neque nisi quod quas facilis
        earum, possimus a, eaque, nostrum labore quae fuga. Tenetur commodi eum quae, saepe doloremque rem totam dolores?
    </h5>
@endsection

@section('title')
    Home
@endsection

{{-- @push('scripts')
    <script src="/jquery.js"></script>
    <script src="/bootstrap.js"></script>
    <script src="/jquery.js"></script>
@endpush --}}

@push('style')
    {{-- <link rel="stylesheet" href="css/style.css"> --}}
    <style>
        h1 {
            color: lightpink
        }
    </style>
@endpush

