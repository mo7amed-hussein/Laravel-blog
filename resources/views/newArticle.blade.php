@extends('layouts.app')

@section('content')
<div class="container">
    <form action="{{url('new')}}" method="post">
        {{csrf_field()}}
        <div class="form-group {{ $errors->has('email') ? ' has-error' : '' }} ">
            <label >Title</label>
            <input type="text" name="title"  value="{{ old('title') }}" class="form-control">
            @if ($errors->has('title'))
                <span class="help-block">
                    <strong>{{ $errors->first('title') }}</strong>
                </span>
            @endif
        </div>
         <div class="form-group {{ $errors->has('email') ? ' has-error' : '' }}">
            <label >Body</label>
            <textarea name="body"  value="{{ old('body') }}"class="form-control" cols="50"
            rows="10"></textarea>

            @if ($errors->has('body'))
                <span class="help-block">
                    <strong>{{ $errors->first('body') }}</strong>
                </span>
            @endif
        </div>
        <button class="btn btn-primary" name="submit">Submit</button>
    </form>
</div>
@endsection
