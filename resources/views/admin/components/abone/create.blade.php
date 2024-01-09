@extends('admin.layout')
@section('content')
    <div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pt-3 pb-2 mb-3 border-bottom">
        <h1 class="h2">Abone Ekle</h1>

    </div>

    <div>
        <a href="{{ route('takip.index') }}"><button type="button" class="btn btn-primary ">Geri
                Ekle</button></a>
    </div>
    <form action="{{ route('takip.store') }}" method="post" enctype="multipart/form-data">
        @csrf

        <div class="card-body">

            <div class="row">
                <div class="form-group col-md-12">
                    <label class="col-12">Anobe Maili</label>

                    <input id="" type="email" class="form-control" value="" name="email" required>
                </div>
            </div>
            <div class="card-footer">
                <button type="submit" class="btn btn-dark btn-lg btn-block w-100 ">EKLE</button>
            </div>
        </div>

    </form>
@endsection
