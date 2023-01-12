@extends('layout.main')

@section('content')
    <div class="container">
        <div class="row">
            <table class="table text-white"">
                <thead>
                    <tr>
                        <th scope="col">ID</th>
                        <th scope="col">Titolo</th>
                        <th scope="col">Serie</th>
                        <th scope="col">Tipo</th>
                        <th scope="col">Azioni</th>
                    </tr>
                </thead>
                <tbody>
                    @forelse ($comics as $comic)
                        <tr>
                            <th scope="row">{{ $comic->id }}</th>
                            <td>{{ $comic->title }}</td>
                            <td>{{ $comic->series }}</td>
                            <td>{{ $comic->type }}</td>
                            <td>XXXX</td>
                        </tr>
                    @empty
                        <p>nessun risultato trovato</p>
                    @endforelse

                </tbody>
            </table>
        </div>
    </div>
@endsection
