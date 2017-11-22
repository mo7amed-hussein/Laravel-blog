@extends('layouts.app')

@section('content')
<div class="container">
    <form action="newArticle" method="post">
        {{csrf_field()}}
        <div class="form-group">
            <label >Title</label>
            <input type="text" name="title" class="form-control">
        </div>
         <div class="form-group">
            <label >Body</label>
            <textarea name="body" class="form-control" cols="50"
            rows="10"></textarea>
        </div>
        <button class="btn btn-primary" name="submit">Submit</button>
    </form>
</div>
@endsection
