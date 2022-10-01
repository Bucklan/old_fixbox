@extends('layouts.app')

@section('title','CREATE PAGE')

@section('content')
    <div class="container">

        @if($errors->any())
                    @foreach($errors->all() as $error)
{{--                       <li>{{$error}}</li>--}}
                    @endforeach

        @endif

        <div class="row">
            <div class="col-sm-12">
                <form action="{{route('post.store')}}" method="post">
                    @csrf
                    <div class="mb-3">
                        <label for="title" class="form-label">Title</label>
                        <input type="text" id="title" name="title" class="form-control @error('title') is-invalid @enderror"  placeholder="Title">
                        @error('title')
                        <div class="invalid-feedback" >{{$message}}</div>
                        @enderror
                    </div>
                    <div class="mb-3">
                        <select name="category_id" class="form-select @error('category_id') is-invalid @enderror" aria-label="Default select example">
                            @foreach($categories as $cat)
                                <option value="{{$cat->id}}">{{$cat->name}}</option>
                            @endforeach
                        </select>
                        @error('category_id')
                        <div class="invalid-feedback">{{$message}}</div>
                        @enderror
                    </div>
                    <div class="mb-3">
                        <label for="validationTextarea" class="form-label">Title</label>
                        <textarea name="content" class="form-control @error('content') is-invalid @enderror" id="validationTextarea" placeholder="Required example textarea" ></textarea>
                        @error('content')
                        <div class="invalid-feedback">{{$message}}</div>
                        @enderror
                    </div>
                    <div class="mb-3">
                        <button class="btn btn-success">SAVE</button>
                    </div>
                </form>
            </div>
        </div>
    </div>

@endsection

