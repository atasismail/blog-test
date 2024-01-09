@extends('admin.layout')
@section('content')
    <div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pt-3 pb-2 mb-3 border-bottom">
        <h1 class="h2">Kategoriler</h1>
    </div>
    <div class="table-responsive">

        <a href="{{ route('category.create') }}"><button type="button" class="btn btn-success float-end mb-2 ">Yeni Kategori
                Ekle</button></a>
        <table class="table table-striped table-sm">
            <thead>
                <tr>
                    <th scope="col">No</th>
                    <th scope="col">Kategori Adı</th>
                    <th style="width: 5px;" scope="col">Düzenle</th>
                    <th style="width: 5px;" scope="col">Sil</th>
                </tr>
            </thead>
            <tbody>
                @php
                    $sayi = 1;
                @endphp
                @foreach ($data as $category)
                    <tr>
                        <td>{{ $sayi++ }}</td>
                        <td>{{ $category->kategori_adi }}</td>
                        <td><a href="{{ route('category.edit', $category->id) }}">
                                <input type="submit" value="Duzenle" name="Duzenle"
                                    class="btn btn-sm btn-warning glyphicon glyphicon-trash" />
                            </a>
                        </td>
                        <td>
                            <form action="{{ route('category.destroy', $category->id) }}" method="post">
                                @csrf
                                <input type="hidden" name="_method" value="DELETE" />
                                <input type="submit" value="Sil" name="Sil" class="btn btn-sm btn-danger" />

                            </form>
                            </a>
                        </td>

                    </tr>
                @endforeach

            </tbody>
        </table>
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
