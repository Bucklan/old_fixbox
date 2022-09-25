<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <title>Laravel</title>

</head>
<body class="antialiased">
<a href="{{route('post.index')}}">ALL POSTS</a><br><br>
<a href="{{route('post.create')}}">Go to Create Page</a><br><br>
@foreach($categories as $cat)
    <a href="{{route('post.category',$cat->id)}}">{{$cat->name}}</a><br>
@endforeach
@foreach($allPost as $post)
    <a href="{{route('post.show',[$post->id])}}">{{$post->title}}</a><br>
    <p>{{$post->content}}</p>
@endforeach

</body>
</html>
