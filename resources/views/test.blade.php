<h1>hello Tester</h1>

{{ "hello"}}

<br><br>

{{ 5 + 2 }}

<br><br>

{!! "<h1>hello</h1>" !!}

<br><br>

{!! "<script>alert('hello NAHID')</script>" !!}

{{-- @php
    $user = "hello user";
    $names_array = ["nahid","khan","amal"];
@endphp

<ul>
@foreach ($names_array as $arr)
@if($loop->frist){
    <li style="background-color: red">{{$arr}}</li>
}@elseif($loop->last)
    <li>{{$arr}}</li>
    {{"the outpur is : " . $arr}}
@endforeach
</ul>
<br/><br/>

{{$user}}; --}}