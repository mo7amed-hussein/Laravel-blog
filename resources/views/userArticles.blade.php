@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row">
        <div class="col col-md-10 col-md-offset-1">
            @foreach($articles as $ar)

        <article class="article-block">
            <h4 class="article-heading"> <a href="{{ route('read',['id'=> $ar->id])}} ">{{$ar->title}} </a></h4>
            <div class="info">
                posted by {{$ar->user->name}} at {{date('F d, Y', strtotime($ar->created_at))}}
            </div>
            <div class="body">
                <?php
                $bodyStr= $ar->body ;  
                if(strlen( $bodyStr ) > 255) 
                {
            $bodyStr = substr($bodyStr, 0,255);
            $bodyStr = substr($bodyStr, 0,strrpos($bodyStr,' '));

                }

             echo $bodyStr.'...';
             ?>

             <a href="{{ route('read',['id'=> $ar->id])}} ">Read More</a>';
                
            </div>
            <form action="{{ route('del',['id'=> $ar->id])}}" method="post">
              {{csrf_field()}}
              <button class="btn btn-danger">Delete</button>
            </form>
        </article>

        @endforeach
        </div>
        
        </div>
    </div>
</div>
@endsection
