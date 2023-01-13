@extends('layout.main')

@section('content')
    <div class="container">
        <div class="row">


            @if (session('deleted'))
                <div class="alert alert-success" role="alert">
                    {{ session('deleted') }}
                </div>
            @endif


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
                                <a class="btn btn-warning mx-1" href="{{ route('comics.edit', $comic) }}" title="edit"><i
                                        class="fa-solid fa-pencil"></i></a>
                                <form onsubmit="return confirm('Confermi l\'eliminazione di: {{ $comic->title }}')"
                                    action="{{ route('comics.destroy', $comic) }}" method="POST" class="mx-1 d-inline">
                                    @csrf
                                    @method('DELETE')

                                    <button type="submit" class="btn btn-danger" href="#" title="delete"><i
                                            class="fa-solid fa-trash"></i></button>
                                </form>
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
