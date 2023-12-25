@extends('layouts.app')

@section('title', 'Главная')

@section('content')
    <main>
        <section id="hero" class="hero d-flex justify-content-center align-items-center text-white ">
            <h1>Онлайн курсы - это круто!</h1>
        </section>

        <section id="about">
            <div class="container">
                <h1 class="">Онлайн курсы - это круто!</h1>
                <div class="row mb-3">
                    <div class="col-sm-6 mb-3 mb-sm-0">
                        <div class="card">
                            <div class="card-body">
                                <h5 class="card-title">Во первых</h5>
                                <p class="card-text">With supporting text below as a natural lead-in to additional
                                    content.</p>
                            </div>
                        </div>
                    </div>
                    <div class="col-sm-6">
                        <div class="card">
                            <div class="card-body">
                                <h5 class="card-title">Во вторых</h5>
                                <p class="card-text">With supporting text below as a natural lead-in to additional
                                    content.</p>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="row mb-3">
                    <div class="col-sm-6 mb-3 mb-sm-0">
                        <div class="card">
                            <div class="card-body">
                                <h5 class="card-title">В третьих</h5>
                                <p class="card-text">With supporting text below as a natural lead-in to additional
                                    content.</p>
                            </div>
                        </div>
                    </div>
                    <div class="col-sm-6">
                        <div class="card">
                            <div class="card-body">
                                <h5 class="card-title">В четвертых</h5>
                                <p class="card-text">With supporting text below as a natural lead-in to additional
                                    content.</p>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </section>

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
                {{ $courses->withQueryString()->links('pagination::bootstrap-5') }}
            </div>
        </section>

        <section id="categories">
            <div class="container">
                <h2 class="m-3">Список категорий</h2>
                <div class="d-flex flex-wrap" style="gap:30px;">
                    @foreach ($categories as $category)
                        <a href="/course/{{ $category->id }}" class="btn btn-primary">{{ $category->title }}</a>
                    @endforeach
                </div>
            </div>
        </section>

        <section id="enroll">
            <div class="container">
                <h2 class="m-3">Оставить заявку</h2>
                <form method="POST" action="/enroll" enctype="multipart/form-data">
                    @csrf
                    <div class="mb-3">
                        <label for="email" class="form-label">Ваш email</label>
                        <input required type="email" class="form-control" name="email" id="email">
                    </div>
                    <div class="mb-3">
                        <label for="name" class="form-label">Ваше имя</label>
                        <input required type="text" class="form-control" name="name" id="name">
                    </div>
                    <div class="mb-3">
                        <label class="form-label">Выберите курс</label>
                        <select required class="form-select" name="course">
                            @foreach ($courses as $item)
                                <option value="{{ $item->id }}">{{ $item->title }}</option>
                            @endforeach

                        </select>
                    </div>
                    <button type="submit" class="btn btn-primary">Оставить заявку</button>
                </form>
            </div>
        </section>

    </main>
@endsection
