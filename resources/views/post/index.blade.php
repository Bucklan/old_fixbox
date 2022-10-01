@extends('layouts.app')

@section('title','MAIN PAGE')

@section('content')
    <div class="container">
        <div class="row justify-content">
            <div class="col-3">
                <a href="{{route('post.create')}}" class="btn btn-success">Go to Create Page</a>
                <br><br>
                @foreach($allPost as $post)
                    <div class="card">
                        <div class="card-body">
                            <h5 class="card-title">{{$post->title}}</h5>
                            <p class="card-text">{{$post->content}}</p>
                            <a href="{{route('post.show',[$post->id])}}" class="btn btn-primary">Details</a>
                        </div>
                    </div><br>
                @endforeach
            </div>
        </div>
    </div>

@endsection

