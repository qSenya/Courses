@extends('layouts.app')

@section('title', 'Главная')

@section('content')

    <section id="courses">
        <div class="container">
            <h2 class="m-3">Список курсов</h2>
            <div class="d-flex flex-wrap" style="gap:30px;">
                @foreach ($courses as $item)
                    <div class="card" style="width: 18rem">
                        <img src="../storage/image/{{ $item->image }}" class="card-img-top" alt="...">
                        <div class="card-body">
                            <h5 class="card-title">{{ $item->title }}</h5>
                            <p class="card-text">{{ $item->description }}</p>
                            <p class="card-text">{{ $item->cost }}р.</p>
                            <p class="card-text">{{ $item->duration }} недель</p>
                            <a href="#" class="btn btn-primary">Go somewhere</a>
                        </div>
                    </div>
                @endforeach
            </div>
        </div>
    </section>
@endsection
