<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="{{ asset('css/home_style.css') }}">
    <title>Post manager</title>
</head>

<body>

<header>
    <div class="links">
        @auth
            <a href="{{ route('logout') }}">Logout</a>
            <a href="{{ route('showPosts') }}">Crea o vedi i tuoi post</a>
        @endauth

        @guest
            <a href="{{route('login')}}">Crea un post</a>
            <a href="{{ route('login') }}">Login</a>
            <a href="{{ route('registerForm') }}">Registrati</a>
        @endguest
    </div>
</header>

<div class="accesso">
    @isset($user)
    <h3>Accesso effettuato come {{$user->name}}</h3>
    @endisset
    @empty($user)
    <h3>Stai navigando anonimo</h3>
    @endempty
</div>

<main>
    @foreach($posts as $post)
    <section>
        <h2>Creato da: {{$post->user->name}}</h2>
        <div class="postBody">
            <ul>
                <li class="title">{{$post->title}}</li>
                <li class="content">{{$post->content}}</li>
            </ul>
            <div class="date">
                <p>
                    creato il {{ $post->created_at->format('d-m-Y') }} 
                    ore {{ $post->created_at->format('H:i') }}
                </p>
            </div>
        </div>
    </section>
    @endforeach
</main>

<footer>
    <p>© {{ date('Y') }} Post Manager - Laravel CRUD Project</p>
</footer>

</body>
</html>