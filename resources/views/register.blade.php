<!DOCTYPE html>
<html lang="it">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Registrazione</title>
    <link rel="stylesheet" href="{{ asset('css/form_style.css') }}">
</head>
<body>
    <div class="auth-container">
        <div class="auth-card">
            <h2>Crea un Account</h2>
            
            <form action="{{ route('registerUser') }}" method="POST">
                @csrf

                <div class="form-group">
                    <label for="name">Nome Completo</label>
                    <input type="text" name="name" id="name" value="{{ old('name') }}" required autofocus>
                </div>

                <div class="form-group">
                    <label for="email">Email</label>
                    <input type="email" name="email" id="email" value="{{ old('email') }}" required>
                </div>
                
                <div class="form-group">
                    <label for="password">Password</label>
                    <input type="password" name="password" id="password" required>
                </div>

                <div class="form-group">
                    <label for="password_confirmation">Conferma Password</label>
                    <input type="password" name="password_confirmation" id="password_confirmation" required>
                </div>

                <button type="submit" class="btn-submit">Registrati</button>
            </form>

            <div class="auth-footer">
                Hai già un account? <a href="{{route('login')}}">Accedi qui</a>
            </div>
        </div>
        <div class="error">
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