@extends('layout.main')

@section('content')
    <div class="container">
        <div class="row">
            <div class="col text-center">
                <h1>{{ $comic->title }}</h1>
                <img src="{{ $comic->image }}" alt="thumb" class="py-3">
                <p class="py-3">{{ $comic->description }}</p>
                <p><strong>{{ $comic->series }}</strong></p>
                <p>{{ $comic->type }}</p>
                <p>{{ $comic->sale_date }}</p>
                <span> &euro; {{ $comic->price }}</span>
            </div>


        </div>
    </div>
@endsection
