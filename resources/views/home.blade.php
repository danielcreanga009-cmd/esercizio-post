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
            <a href="{{ route('showPosts') }}">Vedi i tuoi post</a>
        @endauth

        @guest
            <a href="{{ route('login') }}">Login</a>
            <a href="{{ route('registerForm') }}">Registrati</a>
        @endguest
    </div>
</header>

<main>

    <section>
        <h1>Benvenuto su Post Manager</h1>
        <p>
            Post Manager è una piattaforma sviluppata con Laravel che ti permette di creare,
            gestire e organizzare i tuoi post personali in modo semplice e veloce.
        </p>

        <p>
            Ogni utente ha un’area privata dove può salvare i propri contenuti,
            modificarli in qualsiasi momento o eliminarli quando non servono più.
        </p>

        @guest
            <p>Per iniziare, registrati oppure accedi al tuo account.</p>
            <a href="{{ route('registerForm') }}">Inizia ora</a>
            <a href="{{ route('login') }}">Accedi</a>
        @endguest

        @auth
            <p>Sei loggato! Puoi iniziare a gestire i tuoi post.</p>
            <a href="{{ route('showPosts') }}">Vai ai tuoi post</a>
        @endauth
    </section>

    <hr>

    <section>
        <h2>Cosa puoi fare</h2>

        <ul>
            <li>Creare nuovi post in pochi secondi</li>
            <li>Modificare i tuoi contenuti quando vuoi</li>
            <li>Eliminare post non più utili</li>
            <li>Visualizzare solo i tuoi dati in modo sicuro</li>
        </ul>
    </section>

    <hr>

    <section>
        <h2>Perché questo progetto?</h2>
        <p>
            Questo progetto è stato realizzato per imparare Laravel e il funzionamento di un sistema CRUD completo.
            Simula una vera applicazione web dove ogni utente ha il proprio spazio personale.
        </p>

        <p>
            In futuro può essere esteso con funzionalità avanzate come categorie, immagini, commenti e ricerca.
        </p>
    </section>

</main>

<footer>
    <p>© {{ date('Y') }} Post Manager - Laravel CRUD Project</p>
</footer>

</body>
</html>