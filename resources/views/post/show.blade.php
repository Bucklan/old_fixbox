<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <title>Laravel</title>

</head>
<body class="antialiased">
<a href="{{route('post.index')}}">Go to brain page</a>
<h3>{{$post->title}}</h3>
<h3>{{$post->content}}</h3>
<a href="{{route('post.edit',$post->id)}}">EDIT</a>
<form action="{{route('post.destroy',$post->id)}}" method="post">
    @csrf
    @method('DELETE')
    <button type="submit">DELETE</button>
</form>
<br><br>
<ol class="list-group">
    @foreach($post->comments as $com)
        <li class="list-group-item d-flex justify-content-between align-items-start">
            <div class="ms-2 me-auto">
                {{$com->text}}
            </div>
            <form action="{{route('comments.destroy',$com->id)}}" method="post">
                @csrf
                @method('DELETE')
                <button type="submit">DELETE</button>
            </form>
        </li>
</ol>
@endforeach
<br><br>
<form action="{{route('comments.store')}}" method="post">
    @csrf
    <input type="hidden" value="{{$post->id}}" name="post_id">
    <textarea name="text" cols="20" rows="2"></textarea>
    <button type="submit">SAVE</button>
</form>
</body>
</html>
