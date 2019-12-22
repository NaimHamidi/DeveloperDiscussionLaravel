@extends('layouts.app')

@section('content')

<div class="container">
    <div class="text-center">
        <b><h4>Create a new discussion</h4></b>
    </div>
    <form action="{{ route('discussion.store') }}" method="POST">
            {{ csrf_field() }}

            <div class="form-group">
                <label for="title">Title</label>
                <input type="text" name="title" value="{{ old('title') }}" class="form-control{{ $errors->has('title') ? ' is-invalid' : '' }}">
                @if ($errors->has('title'))
                        <span class="invalid-feedback" role="alert">
                            <strong>{{ $errors->first('title') }}</strong>
                        </span>
                    @endif
            </div>            
            <div class="form-group">
                <label for="content">Ask a question</label>
                <textarea name="content" id="content" cols="30" rows="10" class="form-control{{ $errors->has('content') ? ' is-invalid' : '' }}">{{ old('content') }}</textarea>
                @if ($errors->has('content'))
                        <span class="invalid-feedback" role="alert">
                            <strong>{{ $errors->first('content') }}</strong>
                        </span>
                    @endif
            </div>
            <div class="form-group">
                <button class="btn btn-success pull-right" type="submit">Create discussion</button>
            </div>
        </form>
</div>

@endsection
