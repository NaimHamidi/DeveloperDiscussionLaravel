@extends('layouts.app')

@section('content')

<div class="container">
    <div class="text-center">
        <b><h4>Edit discussion</h4></b>
    </div>
    <form action="{{ route('discussion.update', ['id' => $d->id]) }}" method="POST">
            {{ csrf_field() }}

            <div class="form-group">
                <label for="title">Title</label>
                <input type="text" name="title" value="{{ $d->title }}" class="form-control">
            </div>            
            <div class="form-group">
                <label for="content">Ask a question</label>
                <textarea name="content" id="content" cols="30" rows="10" class="form-control">{{ $d->content }}</textarea>
            </div>
            <div class="form-group">
                <button class="btn btn-success pull-right" type="submit">Update discussion</button>
            </div>
        </form>
</div>

@endsection
