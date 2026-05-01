<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Post manager</title>
    <link rel="stylesheet" href="{{ asset('css/form_style.css') }}">
</head>
<body>
    <div class="form-container">
        <div class="form-arrow">
            <a href="{{url()->previous()}}" class="arrowBack">← torna indetro</a>
        </div>
        <div class="form-card">
            <h2>Crea un nuovo post</h2>
            <form action="{{route('createPost')}}" method="POST">
                @csrf
                <div class="form-group">
                    <label for="title">Titolo</label>
                    <input type="text" name="title" required>
                </div>
                <div class="form-group">
                    <label for="content">Contenuto</label>
                    <textarea rows="4" cols="50" style="resize: none;" name ="content"></textarea>
                </div>
    
                <button type="submit" class="btn-submit">Crea</button>
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