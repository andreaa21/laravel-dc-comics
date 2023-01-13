@extends('layout.main')

@section('content')
    <div class="container">
        <h1>Inserisci un nuovo fumetto</h1>

        <form action="{{ route('comics.update', $comic) }}" method="POST">
            @csrf
            @method('PUT')
            <div class="mb-3">
                <label for="title" class="form-label">Titolo</label>
                <input type="text" class="form-control" name="title" id="title" value="{{ $comic->title }}"
                    placeholder="Inserire il titolo">
            </div>
            <div class="mb-3">
                <label for="image" class="form-label">Immagine</label>
                <input type="text" class="form-control" name="image" id="image" value="{{ $comic->image }}"
                    placeholder="Inserire la URL dell'immagine">
            </div>
            <div class="mb-3">
                <label for="price" class="form-label">Prezzo</label>
                <input type="text" class="form-control" name="price" id="price" value="{{ $comic->price }}"
                    placeholder="Inserire il prezzo">
            </div>
            <div class="mb-3">
                <label for="series" class="form-label">Serie</label>
                <input type="text" class="form-control" name="series" id="series" value="{{ $comic->series }}"
                    placeholder="Inserire la serie">
            </div>
            <div class="mb-3">
                <label for="sale_date" class="form-label">Data di Vendita</label>
                <input type="text" class="form-control" name="sale_date" id="sale_date" value="{{ $comic->sale_date }}"
                    placeholder="Inserire la data di vendita">
            </div>
            <div class="mb-3">
                <label for="type" class="form-label">Genere</label>
                <input type="text" class="form-control" name="type" id="type" value="{{ $comic->type }}"
                    placeholder="Inserire il genere">
            </div>
            <div class="mb-3">
                <label for="description" class="form-label">Descrizione</label>
                <textarea class="form-control" name="description" id="description" name="description" rows="3">{{ $comic->description }}"</textarea>
            </div>
            <button type="submit" class="btn btn-primary mb-5">Invia</button>
        </form>

    </div>
@endsection
