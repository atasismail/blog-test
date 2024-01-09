<!doctype html>
<html lang="tr">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="">
    <meta name="author" content="ismail ataş">
    <meta name="generator" content="Blog v1.0">
    <title>Blog</title>


    <link href="{{ asset('cdn/css/bootstrap.min.css') }}" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css?family=Playfair&#43;Display:700,900&amp;display=swap" rel="stylesheet">
    <link href="{{ asset('cdn/css/blog.css') }}" rel="stylesheet">
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11.10.2/dist/sweetalert2.all.min.js"></script>
    <link href="https://cdn.jsdelivr.net/npm/sweetalert2@11.10.2/dist/sweetalert2.min.css" rel="stylesheet">

</head>

<body>

    @yield('content')

    @if (session()->has('success'))
        <script type="text/javascript">
            Swal.fire({
                title: "{{ session('success') }}",

                icon: "success"
            });
        </script>
    @endif
    @if (session()->has('error'))
        <script type="text/javascript">
            Swal.fire({
                title: "{{ session('error') }}",
                icon: "error"
            });
        </script>
    @endif
    @foreach ($errors->all() as $error)
        <script type="text/javascript">
            Swal.fire({
                title: "{{ session('error') }}",
                text: "{{ $error }}",
                icon: "error"
            });
        </script>
    @endforeach

    <footer class="blog-footer">
        <p>Boostrap Örnek Tema <a href="https://getbootstrap.com/docs/5.3/examples/blog/">Bootstrap</a></p>
        <a href="#">Back to top</a>
        </p>
    </footer>
</body>

</html>
