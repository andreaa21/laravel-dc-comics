<header class="text-center p-3">
    <a href="{{ route('home') }}"><img src="{{ Vite::asset('resources/img/dc-logo.png') }}" alt="Logo"></a>
    <h1 class="p-3">Dc Comics</h1>
    <div class="container">
        <a class="btn btn-success" href="{{ route('comics.create') }}">Aggiungi un nuovo fumetto</a>
    </div>
</header>
