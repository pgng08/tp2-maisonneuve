@extends('layouts.app')

@section('title', mb_substr(__('lang.text_posts'), 0, -1))

@section('content')
    <div class="row mt-5">
        <div class="col-12">
            <a href="{{ route('blog.index') }}" class="btn btn-primary btn-sm">@lang('lang.text_return')</a>
            <h2 class="display-8 pt-3">{{ $blogPost->title }}</h2>
            <hr>
            {{ $blogPost->body }}
            <p><strong>@lang('lang.text_author'): {{ $blogPost->blogHasUser->name }}</strong></p>

            <p><strong>@lang('lang.text_category'): {{ $blogPost->blogHasCategory->category ?? __('lang.text_empty') }}</strong></p>
        </div>
    </div>
    <hr>
    <div class="row text-center">

        <div class="col-md-4">
            <a href="{{ route('blog.show.pdf', $blogPost->id) }}" class="btn btn-warning btn-small btn-sm">Version PDF</a>
        </div>

        <!-- Options for LANGUAGE -->
        @if (Auth::user()->id === $blogPost->user_id)
            <div class="col-md-4">
                <a href="{{ route('blog.edit', $blogPost->id) }}" class="btn btn-success btn-sm">@lang('lang.text_modify')</a>
            </div>

            <div class="col-md-4">

                {{-- Modal JS standard --}}
                <input type="button" class="btn btn-danger btn-sm" data-bs-toggle="modal" data-bs-target="#exampleModal"
                    value="@lang('lang.text_erase')">
            </div>
        @endif

    </div>

    <!-- Modal -->
    <div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h1 class="modal-title fs-5" id="exampleModalLabel">@lang('lang.text_erase')</h1>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    @lang('lang.text_erase') {{ mb_substr(__('lang.text_posts'), 0, -1) }} "{{ $blogPost->title }}" ?
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">@lang('lang.text_no')</button>

                    <form method="POST">
                        @csrf
                        @method('delete')
                        <button class="btn btn-danger">@lang('lang.text_erase')</button>
                    </form>

                </div>
            </div>
        </div>
    </div>


@endsection
