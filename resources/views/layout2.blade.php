@extends('layout.masterlayout')

@section('title')
designer
@endsection

@php
    $name= "Nahid Khan";
    $fruits = ["apple","mango","banana"];
@endphp
{!!"<h1> $name </h1>"!!}
<header style="background-color: lightblue">Layout Page</header>

<script>
    // var data = @json($name);
    var data = {{ Js::from($fruits) }};
    // console.log(data);
    data.forEach(function(entry){
        console.log(entry);
    });
</script>