<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="{{ asset('css/home_style.css') }}">
    <script src="{{ asset('js/home.js') }}"></script>
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
            <a href="/posts">Crea un post</a>
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

<div class="ricerca">
    <form action="{{route('ricerca')}}" method="GET">
        <input type="text" name="name" placeholder="cerca un post">
        <button type="submit">🔎</button>
    </form>
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
                @if(!auth()->user()->is_admin)
                    <form action="{{ route('like', $post) }}" method="POST">
                        @csrf 
                        
                        @if($post->likedByUsers->contains(auth()->id()))
                            <button type="submit" style="color:red;">♥</button>
                        @else 
                            <button type="submit" style="ùcolor:gray;">♡</button>
                        @endif
                        <p>{{$post->likedByUsers->count()}}</p>
                    </form>
                @endif
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

<footer>
    <p>© {{ date('Y') }} Post Manager - Laravel CRUD Project</p>
</footer>

</body>
</html>