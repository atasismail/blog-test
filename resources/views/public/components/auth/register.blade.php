@extends('public.layout')
@section('content')
    <style>
        /* Google Poppins Font CDN Link */
        @import url('https://fonts.googleapis.com/css2?family=Poppins:wght@300;400;500;600;700;800;900&display=swap');

        * {
            margin: 0;
            padding: 0;
            box-sizing: border-box;
        }

        /* Variables */
        :root {
            --primary-font-family: 'Poppins', sans-serif;
            --light-white: #f5f8fa;
            --gray: #5e6278;
            --gray-1: #e3e3e3;
        }

        body {
            font-family: var(--primary-font-family);
            font-size: 14px;
        }
    </style>
    <section class="wrapper">
        <div style="margin: 15vh auto;" class="container">
            <div class="col-sm-8 offset-sm-2 col-lg-6 offset-lg-3 col-xl-4 offset-xl-4 text-center">

                <form action="{{ route('registercontrol') }}" method="POST" class="rounded bg-white shadow p-5">
                    @csrf
                    <div class="logo">
                        @if (Session::has('error'))
                            <div class="alert alert-danger">
                                {{ session('error') }}
                            </div>
                        @elseif(Session::has('success'))
                            <div class="alert alert-success">
                                {{ session('success') }}
                            </div>
                        @endif
                        @foreach ($errors->all() as $error)
                            <div class="alert alert-danger">
                                {{ $error }}
                            </div>
                        @endforeach
                    </div>
                    <h3 class="text-dark fw-bolder fs-4 mb-2">Kayıt Olun</h3>

                    <div class="fw-normal text-muted mb-2">
                        Hesabınız Varsa? <a href="{{ route('login') }}"
                            class="text-primary fw-bold text-decoration-none">Giriş
                            Yapınız</a>
                    </div>


                    <div class="form-floating mb-3">
                        <input type="text" class="form-control" id="name" name="name" placeholder="isim Soyisim"
                            value="{{ old('name') }}" required>
                        <label for="name">Adınız</label>
                    </div>

                    <div class="form-floating mb-3">
                        <input type="text" class="form-control" id="surname" name="surname" placeholder="isim Soyisim"
                            value="{{ old('surname') }}" required>
                        <label for="surname">Soyadınız</label>
                    </div>

                    <div class="form-floating mb-3">
                        <input type="email" class="form-control" id="floatingInput" name="email"
                            placeholder="name@example.com" value="{{ old('email') }}" required>
                        <label for="floatingInput">Email</label>
                    </div>
                    <div class="form-floating mb-3">
                        <input type="password" class="form-control" id="floatingPassword" name="password"
                            placeholder="Password" required>
                        <label for="floatingPassword">Şifre</label>

                    </div>
                    <div class="form-floating mb-3">
                        <input type="password" class="form-control" id="floatingPassword" name="password_confirmation"
                            placeholder="Password" required>
                        <label for="floatingPassword">Şifreyi Doğrula</label>
                    </div>

                    <button type="submit" class="btn btn-primary submit_btn w-100 my-4">Kayıt Ol</button>
                </form>
            </div>
        </div>
    </section>
@endsection
