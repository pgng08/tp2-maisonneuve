@extends('layouts.app')

@section('title', __('lang.text_posts'))

@section('content')
    <div class="row">
        <div class="col-12 text-center pt-3">
            <h1 class="display-7 mt-3">@yield('title')</h1>

        </div>
        <hr>
        <div class="col-md-4">
            <a href="{{ route('blog.create') }}" class="btn btn-success">@lang('lang.text_add')
                {{ mb_substr(__('lang.text_posts'), 0, -1) }} ✍</a>
        </div>
    </div>

    <div class="row mt-3">
        <div class="col-12">
            <div class="card">

                <div class="card-body">
                    <ul>
                        @forelse ($blogs as $blog)
                            <li><a href="{{ route('blog.show', $blog->id) }}">{{ $blog->title }}</a></li>
                        @empty
                            <li class="text-danger">@lang('lang.text_empty')</li>
                        @endforelse
                    </ul>
                </div>
                {{ $blogs }}

            </div>
        </div>
    </div>
@endsection
