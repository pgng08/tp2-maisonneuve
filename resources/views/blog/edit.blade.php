@extends('layouts.app')
@section('title', __('lang.text_modify'))

@section('content')
    <!-- Condition IF user connected = author  -->
    @if (Auth::user()->id === $blogPost->user_id)
        <div class="row">
            <div class="col-12 text-center pt-3">
                <h1 class="display-7 mt-3">
                    @lang('lang.text_modify')
                    {{ mb_substr(__('lang.text_posts'), 0, -1) }} </h1>
            </div>
            <!--/col-12-->
        </div>
        <!--/row-->
        <hr>
        <div class="row justify-content-center">
            <div class="col-md-6">
                <div class="card">
                    <form method="post">
                        @csrf
                        @method('put')
                     
                        <div class="card-body">
                            <div class="control-group col-12">
                                <label for="title">@lang('lang.text_title')</label>
                                <input type="text" id="title" name="title" class="form-control"
                                    value="{{ $blogPost->title }}">
                            </div>
                            <div class="control-group col-12">
                                <label for="message">@lang('lang.text_text')</label>
                                <textarea class="form-control" id="message" name="body">{{ $blogPost->body }}</textarea>
                            </div>
                            <div class="control-grup col-12">
                                <label for="category">@lang('lang.text_category')</label>
                                <select id="category" name="categories_id" class="form-control">
                                    <option value="">@lang('lang.text_select')</option>
                                    @foreach ($categories as $category)
                                        <option value="{{ $category->id }}"
                                            @if ($category->id == $blogPost->categories_id) selected @endif>
                                            {{ $category->category }}</option>
                                    @endforeach
                                </select>
                            </div>
                        </div>
                        <div class="card-footer text-center">
                            <input type="submit" class="btn btn-success" value="{{ __('lang.text_submit') }}">
                        </div>
                    </form>
                </div>
            </div>
        </div>
    @else
        <p class="lead mt-5">
            {{mb_strtoupper(__('lang.text_error'))}}: @lang('lang.text_modify') {{ mb_substr(__('lang.text_posts'), 0, -1) }}.
        </p>
        <a href="{{ route('login') }}" class="btn btn-primary btn-small">@lang('lang.text_login')</a>


    @endif

@endsection
