@extends('layouts.app')
@section('title', __('lang.text_users'))
@section('content')
    <div class="row">
        <div class="col-12 text-center pt-3">
            <h1 class="display-7 mt-3">@lang('lang.text_users')</h1>
        </div>
        <hr>
        <div class="col-12">
            <table class="table table-striped">
                <thead>
                    <tr>
                        <th>@lang('lang.text_users')</th>
                        <th>@lang('lang.text_email')</th>
                        <th>@lang('lang.text_posts')</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($users as $user)
                        <tr>
                            <td>{{ $user->name }}</td>
                            <td>{{ $user->email }}</td>
                            <td>
                                @foreach ($user->userHasPosts as $post)
                                    <p><a href="{{ route('blog.show', $post->id) }}">{{ $post->title }}</a></p>
                                @endforeach
                            </td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
            {{ $users }}

        </div>

    </div>
@endsection
