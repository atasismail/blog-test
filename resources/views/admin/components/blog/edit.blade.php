@extends('admin.layout')
@section('content')
    <div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pt-3 pb-2 mb-3 border-bottom">
        <h1 class="h2">Blog Güncelle</h1>
    </div>
    <div>
        <a href="{{ route('blog.index') }}"><button type="button" class="btn btn-primary ">Geri
                Ekle</button></a>
    </div>
    <form action="{{ route('blog.update', [$data['blog']->id]) }}" method="post" enctype="multipart/form-data">
        @csrf
        @method('PATCH')
        <div class="card-body">

            <div class="row">
                <div class="form-group col-md-6 text-center">
                    <label class="col-12">Yüklü Resim</label>
                    <img width="200" src="{{ asset('cdn/images/' . $data['blog']->blog_resmi) }}" class="img-thumbnail">


                </div>
                <input type="text" name="old_file" value="{{ $data['blog']->blog_resmi }}" hidden>
                <div style="margin-top: -25px;" class="form-group col-md-6">
                    <br>
                    <label class="col-6">Blog Resmi</label>
                    <input id="fileInput" name="blog_resmi" type="file" accept="image/*" class="form-control">
                </div>
                <div class="form-group col-md-12">
                    <label class="col-12">Kategori Ekle</label>

                    <select id="kategori_id" name="kategori_id" class="form-control" required>
                        <option value="">Kategori Seçiniz</option>
                        @foreach ($data['kategori'] as $kategori)
                            <option value="{{ $kategori->id }}">{{ $kategori->kategori_adi }}</option>
                        @endforeach
                    </select>
                </div>
                <div class="form-group col-md-12">
                    <label class="col-12">Blog Başlık</label>

                    <input id="" type="text" class="form-control" value="{{ $data['blog']->blog_baslik }}"
                        name="blog_baslik" required>
                </div>
                <div class="form-group col-md-12">
                    <label class="col-12">Blog İçerik</label>

                    <textarea style="width: 100%;" name="blog_icerik" id="" cols="30" rows="10" required>{{ $data['blog']->blog_icerik }}</textarea>
                </div>

            </div>
            <div class="card-footer">
                <button type="submit" class="btn btn-dark btn-lg btn-block w-100 ">Güncelle</button>
            </div>
        </div>

    </form>
    <script>
        $(document).ready(function() {
            $("#kategori_id").val("{{ $data['blog']->kategori_id }}");
        });
    </script>
@endsection
