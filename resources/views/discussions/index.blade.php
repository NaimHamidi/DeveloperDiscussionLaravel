@extends('layouts.app')

@section('content')

<div class="container">
    <br>
    <div class="text-right">
        <a href="{{ route('discussion.create') }}" class="btn btn-primary">Create Discussion</a>
    </div>

    <br>

    @foreach($discussions as $d)
        <div class="card">
            <div class="card-header">
                Created by : <b>{{ $d->user->name }}</b>
                @if($d->user->id == $userid)
                    <p class="d-inline-block float-right">
                        <a href="{{ route('discussion.edit', ['id' => $d->id ]) }}" class="btn btn-sm btn-warning">Edit</a>
                        <a href="{{ route('discussion.delete', ['id' => $d->id]) }}" class="btn btn-sm btn-danger">Delete</a>
                    </p>
                @endif
            </div>
            <div class="card-body text-center">
                <h5>{{ $d->title }}</h5>
                <br>
                <p class="card-text">{{ str_limit($d->content, 200) }}</p>
                <a href="{{ route('discussion.show', ['id' => $d->id]) }}" class="btn btn-sm btn-primary">View</a>
            </div>
            <div class="card-footer text-muted">
                @if($d->created_at == $d->updated_at)
                Created : {{ $d->created_at->diffForHumans() }}
                @else
                Updated : {{ $d->updated_at->diffForHumans() }}
                @endif
                <p class="d-inline-block float-right"><a href="{{ route('discussion.show', ['id' => $d->id]) }}">{{ $d->replies->count() }} Replies</a></p>
            </div>
        </div>
        <br>        
    @endforeach
    <div class="text-center">
        {{ $discussions->links() }}
    </div>
</div>


@endsection