<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="{{ asset('css/posts_style.css') }}">
    <title>Post manager</title>
</head>
<body>
    <h1>Posts di {{$user->name}}</h1>
    <div class="navBar">
        <a href="{{route('createForm')}}">Aggiungi Post</a>
        <div class="sideBtn">
            <a href="{{route('logout')}}" class="logoutBtn">Logout</a>
            <a href="{{route('home')}}" class="homeBtn">Home</a>
        </div>
    </div>
    

    

    @foreach($posts as $post)
    <ul>
        <li>{{$post->title}}</li>
        <li>{{$post->content}}</li>
        <form action="{{route('editForm',$post)}}" method="GET">
            @csrf
            <button type="submit">Modifica</button>
        </form>
        <form action="{{route('deletePost',$post)}}" method="POST">
            @csrf
            <button type="submit">Elimina</button>
        </form>
    </ul>
    @endforeach
</body>
</html>