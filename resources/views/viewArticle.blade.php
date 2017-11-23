@extends('layouts.app')

@section('content')
<div class="container">
    <p> {{$article->title}}</p>
    <div>
        {{$article->body}}
    </div>
</div>
@endsection
