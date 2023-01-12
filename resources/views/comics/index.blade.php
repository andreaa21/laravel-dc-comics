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
                            <td>
                                <a href="{{ route('comics.show', $comic) }}" class="btn btn-primary mx-1" title="show"><i
                                        class="fa-regular fa-eye"></i></a>
                                <a class="btn btn-warning mx-1" href="#" title="edit"><i
                                        class="fa-solid fa-pencil"></i></a>
                                <a class="btn btn-danger mx-1" href="#" title="delete"><i
                                        class="fa-solid fa-trash"></i></a>
                            </td>
                        </tr>
                    @empty
                        <p>nessun risultato trovato</p>
                    @endforelse

                </tbody>
            </table>

            {{ $comics->links() }}
        </div>
    </div>
@endsection
