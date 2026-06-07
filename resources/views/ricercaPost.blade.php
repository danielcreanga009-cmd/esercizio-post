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
            @if(!auth()->user()->is_admin)
            <a href="{{ route('showPosts') }}">Crea o vedi i tuoi post</a>
            @endif
        @endauth

        @guest
            <a href="{{route('login')}}">Crea un post</a>
            <a href="{{ route('login') }}">Login</a>
            <a href="{{ route('registerForm') }}">Registrati</a>
        @endguest
    </div>
</header>

<div class="backHome">
    <a href="/home">← Ritorna alla home</a>
</div>

<main>
    @foreach($posts as $post)
    <section>
        <div class="like">
            @guest
                <form action="{{ route('like', $post) }}" method="POST">
                    @csrf 
                        <button type="submit" style="ùcolor:gray;">♡</button>
                        <p>{{$post->likedByUsers->count()}}</p>
                </form>
            @endguest
            @auth
            <form action="{{ route('like', $post) }}" method="POST">
                @csrf 
                
                @if($post->likedByUsers->contains(auth()->id()))
                    <button type="submit" style="color:red;">♥</button>
                @else 
                    <button type="submit" style="ùcolor:gray;">♡</button>
                @endif
                <p>{{$post->likedByUsers->count()}}</p>
            </form>
            @endauth
        </div>
        <h2>Creato da: 
            @auth
                @if($post->user->name == auth()->user()->name)
                    me
                @else {{$post->user->name}}
                @endif
            @endauth
            @guest
                {{$post->user->name}}
            @endguest
        </h2>
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

        @auth
            @if(auth()->user()->is_admin)
                <div class="elimina">
                    <form action="{{route('deletePostAdmin',$post)}}" method="POST">
                        @csrf
                        <button type="submit">❌</button>
                    </form>
                </div>
            @endif
        @endauth
    </section>
    @endforeach
</main>

@if($posts->isEmpty())
    <p class="message">Non esistono post in base alla tua ricerca</p>
@endif

<footer>
    <p>© {{ date('Y') }} Post Manager - Laravel CRUD Project</p>
</footer>

</body>
</html>