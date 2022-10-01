@extends('layouts.app')

@section('title','DETAILS PAGE')
@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-12">
                <a href="{{route('post.index')}}" class="btn btn-success center">Go to Back</a>
                <br><br>
                <div class="card">
                    <div class="card-body">
                        <h5 class="card-title">{{$post->title}}</h5>
                        <p class="card-text">{{$post->content}}</p>
                        <a href="{{route('post.edit',$post->id)}}" class="btn btn-success me-lg-5">EDIT</a>
                        <form action="{{route('post.destroy',$post->id)}}" method="post">
                            @csrf
                            @method('DELETE')
                            <div class="me-5">

                                <!-- Button trigger modal -->
                                <button class="btn btn-danger" data-bs-toggle="modal" data-bs-target="#exampleModal">
                                    DELETE
                                </button>
                            </div>


                            <!-- Modal -->
                            <div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel"
                                 aria-hidden="true">
                                <div class="modal-dialog">
                                    <div class="modal-content">
                                        <div class="modal-header">
                                            <h5 class="modal-title" id="exampleModalLabel">Modal title</h5>
                                            <button type="button" class="btn-close" data-bs-dismiss="modal"
                                                    aria-label="Close"></button>
                                        </div>
                                        <div class="modal-body">
                                            You are sure?
                                        </div>
                                        <div class="modal-footer">
                                            <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">NO
                                            </button>
                                            <button type="button" class="btn btn-danger">YES</button>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
                <br>
            </div>
        </div>
        <div class="row">
            <div class="col-12">
                <div class="py-lg-5">
                    @foreach($post->comments as $com)
                        <ol class="list-group mb-3">Username Name
                            <li class="list-group-item d-flex justify-content-between align-items-start mb-sm-1">
                                <div class="me-auto mb-auto">
                                    {{$com->text}}
                                </div>
                                <a href="{{route('comments.edit',$com->id)}}" class="btn btn-secondary">EDIT</a>
                                <form action="{{route('comments.destroy',$com->id)}}" method="post">
                                    @csrf
                                    @method('DELETE')
                                    <button class="btn btn-danger">DELETE</button>
                                </form>
                            </li>
                        </ol>
                    @endforeach
                </div>
            </div>
        </div>

        <div class="row">
            <div class="col-sm-12">
                <form action="{{route('comments.store')}}" method="post">
                    @csrf
                    <div class="form-floating mb-3">
                        <input type="hidden" value="{{$post->id}}" name="post_id">
                        <textarea name="text" class="form-control" placeholder="Leave a comment here"
                                  id="floatingTextarea"></textarea>
                        <label for="floatingTextarea">Comments</label>
                    </div>
                    <div class="mb-3">
                        <button class="btn btn-success">SEND</button>
                    </div>
                </form>
            </div>
        </div>
    </div>


@endsection
