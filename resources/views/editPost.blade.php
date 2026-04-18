<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="{{ asset('css/form_style.css') }}">
    <title>Post manager</title>
</head>
<body>
    <div class="form-container">
        <div class="form-arrow">
            <a href="{{url()->previous()}}" class="arrowBack">← torna indetro</a>
        </div>
        <div class="form-card">
            <h2>Modifica Post</h2>
            <form action="{{route('editPost',$post)}}" method="POST">
                @csrf

                <div class="form-group">
                    <label for="title">Titolo</label>
                    <input type="text" name="title" value="{{$post->title}}" required>
                </div>

                <div class="form-group">
                    <label for="content">Contenuto</label>
                    <input type="text" name="content" value="{{$post->content}}" required>
                </div>

                <button type="submit" class="btn-submit">Modifica</button>
            </form>
        </div>
        <div class="form-errors">
            @if ($errors->any())
                <ul>
                    @foreach ($errors->all() as $error)
                        <li>{{ $error }}</li>
                    @endforeach
                </ul>
            @endif
        </div>
    </div>
    
</body>
</html>