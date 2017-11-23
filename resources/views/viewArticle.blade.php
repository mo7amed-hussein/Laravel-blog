@extends('layouts.app')

@section('content')
<div class="container">
    <h3> {{$article->title}}</h3>
    <div class="article-body">
        {{$article->body}}
    </div>
    <div>
        <strong>Comments</strong>
    </br>
            @foreach($article->comments as $c)
                  <div class="comment">
                   <p>{{$c->body}} 
                   </p>
                  <small class="info">  by {{$c->user->name}} at {{date('F d, Y', strtotime($c->created_at))}}
                    </small>
                </div>
            @endforeach
        
        <form action="{{ route('read',['id'=> $article->id])}}" method="post">
        {{csrf_field()}}
         <div class="form-group">
            <label >Leave Comment</label>
            <textarea name="body" class="form-control" cols="50"
            rows="5"></textarea>
        </div>
        <button class="btn btn-primary" name="submit">Submit</button>
    </form>
    </div>
</div>
@endsection
