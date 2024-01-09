@extends('public.layout')
@section('content')
    <style>
        .bd-placeholder-img {
            font-size: 1.125rem;
            text-anchor: middle;
            -webkit-user-select: none;
            -moz-user-select: none;
            user-select: none;
        }

        @media (min-width: 768px) {
            .bd-placeholder-img-lg {
                font-size: 3.5rem;
            }
        }
    </style>

    <div class="container">
        <header class="blog-header py-3">
            <div class="row flex-nowrap justify-content-between align-items-center">
                <div class="col-4 pt-1">
                    <a class="link-secondary" href="{{ route('abone') }}">Takip Et</a>
                </div>
                <div class="col-4 text-center">
                    <div class="blog-header-logo text-dark" href="#">Blog</div>
                </div>
                <div class="col-4 d-flex justify-content-end align-items-center">
                    <a class="btn btn-sm btn-outline-secondary mx-1 " href="{{ route('register') }}">Kayıt Ol</a>

                    <a class="btn btn-sm btn-outline-secondary" href="{{ route('login') }}">Giriş</a>
                </div>
            </div>
        </header>

        <div class="nav-scroller py-1 mb-2">
            <nav class="nav d-flex justify-content-between">
                @foreach ($data['category'] as $category)
                    <a class="p-2 link-secondary"
                        href="{{ route('kategori', ['id' => $category->id]) }}">{{ $category->kategori_adi }}</a>
                @endforeach
            </nav>
        </div>
    </div>

    <main class="container">
        <div class="p-4 p-md-5 mb-4 text-white rounded bg-dark">
            <div class="col-md-6 px-0">
                <h1 class="display-4 fst-italic">Boostrap Örnek Tema Kullandım</h1>
                <p class="lead my-3">Tema Linki</p>
                <p class="lead mb-0"><a href="https://getbootstrap.com/docs/5.3/examples/blog/"
                        class="text-white fw-bold">Boostrap Blog Example.</a></p>
            </div>
        </div>

        <div class="row mb-2">
            @foreach ($data['blog'] as $blog)
                <div class="col-md-6">
                    <div
                        class="row g-0 border rounded overflow-hidden flex-md-row mb-4 shadow-sm h-md-250 position-relative">
                        <div class="col p-4 d-flex flex-column position-static">
                            <strong class="d-inline-block mb-2 text-primary">{{ $blog->kategori->kategori_adi }}</strong>
                            <h3 class="mb-0">{{ $blog->blog_baslik }}</h3>
                            <div class="mb-1 text-muted">{{ $blog->created_at }}</div>
                            <p class="card-text mb-auto">{{ $blog->blog_icerik }}.</p>
                            <a href="#" class="stretched-link"></a>
                        </div>
                        <div class="col-auto d-none d-lg-block">
                            <img style="object-fit: cover;" class="bd-placeholder-img" width="200" height="250"
                                src="{{ asset('cdn/images/' . $blog->blog_resmi) }}" alt="" srcset="">

                        </div>
                    </div>
                </div>
            @endforeach
        </div>
        <nav aria-label="...">
            <ul class="pagination">
                <li class="page-item {{ $data['blog']->currentPage() == 1 ? 'disabled' : '' }}">
                    <a class="page-link" href="{{ $data['blog']->previousPageUrl() }}" tabindex="-1"
                        aria-disabled="true">Geri</a>
                </li>
                @for ($i = 1; $i <= $data['blog']->lastPage(); $i++)
                    <li class="page-item {{ $i == $data['blog']->currentPage() ? 'active' : '' }}" aria-current="page">
                        <a class="page-link" href="{{ $data['blog']->url($i) }}">{{ $i }}</a>
                    </li>
                @endfor
                <li class="page-item {{ $data['blog']->currentPage() == $data['blog']->lastPage() ? 'disabled' : '' }}">
                    <a class="page-link" href="{{ $data['blog']->nextPageUrl() }}">İleri</a>
                </li>
            </ul>
        </nav>


    </main>
@endsection
