@extends('admin.layout')
@section('content')
    <div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pt-3 pb-2 mb-3 border-bottom">
        <h1 class="h2">Yönetim Paneli</h1>
    </div>
    <a href="{{ route('category.index') }}">
        <button type="button" class="btn btn-primary position-relative ">
            kategori Sayısı
            <span class="position-absolute top-0 start-100 translate-middle badge rounded-pill bg-danger">
                {{ $kategori_sayisi }}
            </span>
        </button>
    </a>
    <a href="{{ route('blog.index') }}">
        <button type="button" class="btn btn-primary position-relative  mx-5">
            Blog Sayısı
            <span class="position-absolute top-0 start-100 translate-middle badge rounded-pill bg-danger">
                {{ $blog_sayisi }}
            </span>
        </button>
    </a>
    <a href="{{ route('takip.index') }}">
        <button type="button" class="btn btn-primary position-relative  mx">
            Abone Sayısı
            <span class="position-absolute top-0 start-100 translate-middle badge rounded-pill bg-danger">
                {{ $abone_sayisi }}
            </span>
        </button>
    </a>
@endsection
