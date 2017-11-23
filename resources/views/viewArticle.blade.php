@extends('layouts.app')

@section('content')
<div class="container">
    <p> {{$article->title}}</p>
    <div>
        {{$article->body}}
    </div>
    <div>
        <table class="table">
            <tr><td>Comments</td></tr>
            @foreach($article->comments as $c)
            <tr>
                <tr><td> <p>{{$c->body}}</p>
                    by {{$c->user->name}} on {{date('F d, Y', strtotime($c->created_at))}}
                </td></tr>
               
            </tr>
            @endforeach
        </table>
        <form action="{{ route('read',['id'=> $article->id])}}" method="post">
        {{csrf_field()}}
         <div class="form-group">
            <label >Comment</label>
            <textarea name="body" class="form-control" cols="50"
            rows="5"></textarea>
        </div>
        <button class="btn btn-primary" name="submit">Submit</button>
    </form>
    </div>
</div>
@endsection
