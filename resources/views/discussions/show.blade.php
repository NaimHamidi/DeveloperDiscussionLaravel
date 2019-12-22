@extends('layouts.app')

@section('content')

<div class="container">
    <br>
    <div class="card">
        <div class="card-header">
            Created by : <b>{{ $discussion->user->name }}</b>
        </div>
        <div class="card-body text-center">
            <h5>{{ $discussion->title }}</h5>
            <br>
            <p class="card-text">{{ $discussion->content }}</p>
            <hr><br>
            <div class="container">
                
                        <form action="{{ route('discussion.reply', ['id' => $discussion->id ]) }}" method="post">
                            {{ csrf_field() }}
                            <div class="form-group">
                                <label for="content"><b>Leave a reply...</b></label>
                                <textarea name="content" id="content" class="form-control{{ $errors->has('content') ? ' is-invalid' : '' }}" cols="30" rows="3"></textarea>
                                @if ($errors->has('content'))
                        <span class="invalid-feedback" role="alert">
                            <strong>{{ $errors->first('content') }}</strong>
                        </span>
                    @endif
                            </div>
                            <div class="form-group">
                                <button class="btn btn-primary btn-sm pull-right">Leave a reply</button>
                            </div>
                        </form>
                    <br>
            </div>
            <div class="container">
                @foreach($discussion->replies as $r)
                    <div class="card">
                        <div class="card-body text-left">
                            Replied by : <b>{{ $r->user->name }}</b>
                            <hr>
                            <p class="text-cente">{{ $r->content }}</p>
                        </div>
                    </div><br>
                @endforeach
            </div>
        </div>
    </div>
</div>


@endsection