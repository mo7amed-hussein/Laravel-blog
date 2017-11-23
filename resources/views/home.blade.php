@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row">
        <div class="col col-md-8">
            @foreach($articles as $ar)

        <article class="article-block">
            <p> <a href="{{ route('read',['id'=> $ar->id])}} ">{{$ar->title}} </a></p>
            <div class="info">
                posted by {{$ar->user->name}} on {{date('F d, Y', strtotime($ar->created_at))}}
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
        </article>

        @endforeach
        </div>
        <div class="col col-md-4">
           top comments
        </div>
    </div>
</div>
@endsection
