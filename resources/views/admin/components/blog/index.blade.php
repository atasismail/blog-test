@extends('admin.layout')

@section('content')
    <style>
        .container {
            padding: 2rem 0rem;
        }

        h4 {
            margin: 2rem 0rem 1rem;
        }

        .table-image td,
        .table-image th {
            vertical-align: middle;
        }
    </style>
    <div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pt-3 pb-2 mb-3 border-bottom">
        <h1 class="h2">Bloglar</h1>
    </div>

    <div class="table-responsive">
        <a href="{{ route('blog.create') }}"><button type="button" class="btn btn-success float-end mb-2 ">Yeni Blog
                Ekle</button></a>
        <div class="container">
            <div class="row">
                <div class="col-12">
                    <table class="table table-image">
                        <thead>
                            <tr>
                                <th scope="col">No</th>
                                <th scope="col">Kategori</th>
                                <th scope="col">Blog Resim</th>
                                <th scope="col">Blog Başlık</th>
                                <th scope="col">Blog İçerik</th>
                                <th scope="col">Düzenle</th>
                                <th scope="col">Sil</th>
                            </tr>
                        </thead>
                        <tbody>
                            @php
                                $sayi = 1;
                            @endphp
                            @foreach ($data as $blog)
                                <tr>
                                    <th scope="row">1</th>
                                    <td scope="row">{{ $blog->kategori->kategori_adi }}</td>
                                    <td class="w-25">
                                        <img style="max-width: 100px;" src="{{ asset('cdn/images/' . $blog->blog_resmi) }}"
                                            class="img-fluid img-thumbnail">
                                    </td>
                                    <td>{{ $blog->blog_baslik }}</td>
                                    <td>{{ $blog->blog_icerik }}</td>
                                    <td><a href="{{ route('blog.edit', $blog->id) }}">
                                            <input type="submit" value="Duzenle" name="Duzenle"
                                                class="btn btn-sm btn-warning glyphicon glyphicon-trash" />
                                        </a>
                                    </td>
                                    <td>
                                        <form action="{{ route('blog.destroy', $blog->id) }}" method="post">
                                            @csrf
                                            <input type="hidden" name="_method" value="DELETE" />
                                            <input type="submit" value="Sil" name="Sil"
                                                class="btn btn-sm btn-danger" />

                                        </form>
                                        </a>
                                    </td>
                                </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
        <nav aria-label="...">
            <ul class="pagination">
                <li class="page-item {{ $data->currentPage() == 1 ? 'disabled' : '' }}">
                    <a class="page-link" href="{{ $data->previousPageUrl() }}" tabindex="-1" aria-disabled="true">Geri</a>
                </li>
                @for ($i = 1; $i <= $data->lastPage(); $i++)
                    <li class="page-item {{ $i == $data->currentPage() ? 'active' : '' }}" aria-current="page">
                        <a class="page-link" href="{{ $data->url($i) }}">{{ $i }}</a>
                    </li>
                @endfor
                <li class="page-item {{ $data->currentPage() == $data->lastPage() ? 'disabled' : '' }}">
                    <a class="page-link" href="{{ $data->nextPageUrl() }}">İleri</a>
                </li>
            </ul>
        </nav>
    </div>
@endsection
