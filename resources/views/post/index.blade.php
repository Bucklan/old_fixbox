<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <title>Laravel</title>

</head>
<body class="antialiased">

<a href="{{route('post.index')}}" class="btn btn-dark">ALL POSTS</a><br><br>
<a href="{{route('post.create')}}" class="btn btn-success">Go to Create Page</a><br><br>
@foreach($categories as $cat)
    <a class="btn btn-primary" href="{{route('post.category',$cat->id)}} ">{{$cat->name}}</a><br>
@endforeach
@foreach($allPost as $post)
    <a class="btn btn-danger" href="{{route('post.show',[$post->id])}}">{{$post->title}}</a><br>
    <p>{{$post->content}}</p>
@endforeach

</body>
</html>
