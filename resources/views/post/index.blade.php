<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <title>Laravel</title>

</head>
<body class="antialiased">
<a href="{{route('post.create')}}">Go to Create Page</a><br><br>
@foreach($allPost as $post)
    <a href="{{route('post.show',[$post->id])}}">{{$post->title}}</a><br>
    <p>{{$post->content}}</p>
@endforeach

</body>
</html>