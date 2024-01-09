<!DOCTYPE html>
<html>

<head>
    <title>Blog</title>
</head>

<body>
    <h1>{{ $blog_baslik }}</h1>
    <img src="{{ asset('cdn/images/' . $blog_resmi) }}" alt="" srcset="">
    <p>
        {{ $blog_icerik }}
    </p>

</body>

</html>
