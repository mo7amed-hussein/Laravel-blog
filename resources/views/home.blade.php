@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row">
        <div class="col col-md-8">
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
        </article>

        @endforeach
        </div>
        <div class="col col-md-4">

          
            <div class="panel panel-info">
                <div class="panel-heading">
                  <h3 class="panel-title">Recent Comments</h3>
                </div>
                <div class="panel-body">
                  
                @foreach($comments as $c)
                  <div class="comment">
                    <?php 
                    $body = $c->body;
                    if(strlen( $body ) > 30) 
                {
                $body = substr($body, 0,30);
                $body = substr($body, 0,strrpos($body,' '));
                $body = $body.'...';
                }
                  
             
                    ?>
                   <p>{{$body}} 
                     <small><a href="{{ route('read',['id'=> $c->article_id])}} ">More</a> </small>
                   </p>
                  <small class="info">  by {{$c->user->name}} on {{date('F d, Y', strtotime($c->created_at))}}
                    </small>
                </div>
               @endforeach
               </div>
                </div>
          </div>
               
        
        </div>
    </div>
</div>
@endsection
