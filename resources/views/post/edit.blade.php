<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <title>Laravel</title>

</head>
<body class="antialiased">
<a href="{{route('post.index')}}">Go to Create Page</a>
<form action="{{route('post.update',$post->id)}}" method="post">
    @csrf
    @method('PUT')
    <label for="title">Title</label>
    <input type="text" id="title" name="title" value="{{$post->title}}">
    <select name="category_id">
        @foreach($categories as $cat)
            <option @if($cat->id==$post->category_id) selected @endif() value="{{$cat->id}}">{{$cat->name}}</option>
        @endforeach
    </select>
    <label for="content">Content</label>
    <textarea name="content" id="content" cols="30" rows="10">{{$post->content}}</textarea>
    <button type="submit">Update post</button>
</form>
</body>
</html>
