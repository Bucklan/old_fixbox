@extends('layouts.app')

@section('title','EDIT PAGE')

@section('content')

    <div class="container">
        <a href="{{route('post.show',$post->id)}}" class="btn btn-success">Go to Back</a>
        <div class="row">
            <div class="col-sm-12">
                <form action="{{route('post.update',$post->id)}}" method="post">
                    @csrf
                    @method('PUT')
                    <div class="mb-3">
                        <label for="title" class="form-label">Title</label>
                        <input type="text" id="title" name="title" value="{{$post->title}}" class="form-control"
                               placeholder="Title">
                    </div>
                    <div class="mb-3">
                        <select name="category_id" class="form-select" aria-label="Default select example">
                            @foreach($categories as $cat)
                                <option @if($cat->id==$post->category_id) selected
                                        @endif() value="{{$cat->id}}">{{$cat->name}}</option>
                            @endforeach
                        </select>
                    </div>
                    <div class="mb-3">
                        <label for="exampleFormControlTextarea1" class="form-label">Select Content</label>
                        <textarea class="form-control" name="content" id="exampleFormControlTextarea1"
                                  rows="3">{{$post->content}}</textarea>
                    </div>
                    <div class="mb-3">
                        <button class="btn btn-success">EDIT</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
@endsection


