<!DOCTYPE html>
<html lang="it">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Accedi</title>
    <link rel="stylesheet" href="{{ asset('css/form_style.css') }}">
</head>
<body>
    <div class="auth-container">
        <div class="auth-card">
            <h2>Accedi</h2>

            <form action="{{ route('loginUser') }}" method="POST">
                @csrf

                <div class="form-group">
                    <label for="email">Email</label>
                    <input type="email" name="email" id="email" required>
                </div>
                
                <div class="form-group">
                    <label for="password">Password</label>
                    <input type="password" name="password" id="password" required>
                </div>

                <button type="submit" class="btn-submit">Entra</button>
            </form>

            <div class="auth-footer">
                Non hai un account? <a href="{{route('registerForm')}}">Registrati</a>
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