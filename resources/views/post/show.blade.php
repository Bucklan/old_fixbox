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
</body>
</html>
