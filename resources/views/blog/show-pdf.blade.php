<!DOCTYPE html>
<html lang="{{ session('locale') ?? 'en' }}">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>@yield('title')</title>
</head>

<body>
<p>{{ config('app.name') }}</p>
    <p><small>[Version PDF: {{ Str::upper(session('locale')) }}]</small></p>
    <h3>{{ $blogPost->title }}</h3>
    <hr>
    <p>{!! $blogPost->body !!}</p>
    <hr>
    <strong>Author: {{ $blogPost->blogHasUser->name }}</strong>
</body>

</html>
