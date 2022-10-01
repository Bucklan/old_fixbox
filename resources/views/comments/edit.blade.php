@extends('layouts.app')

@section('title','EDIT-COMMENT PAGE')

@section('content')
    <div class="container">
        <div class="row">
            <div class="col-12">
                <form action="{{route('comments.update',$comment->id)}}" method="post">
                    @csrf
                    @method('PUT')
                    <textarea name="text" class="form-control" placeholder="Leave a comment here"
                              id="floatingTextarea">{{$comment->text}}</textarea>
                    <div class="py-3">
                        <button class="btn btn-success">Update comment</button>
                    </div>
                </form>
            </div>
        </div>
    </div>




@endsection
