@extends('layouts.app')
@section('title', __('lang.text_add'))
@section('content')
    <div class="row">
        <div class="col-12 text-center pt-3">
            <h1 class="display-7 mt-3">
                @lang('lang.text_add')
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
                  
                    <div class="card-body">
                        <div class="control-grup col-12">
                            <label for="title">@lang('lang.text_title')</label>
                            <input type="text" id="title" name="title" class="form-control">
                        </div>
                        <div class="control-grup col-12">
                            <label for="message">@lang('lang.text_text')</label>
                            <textarea class="form-control" id="message" name="body"></textarea>
                        </div>
                        <div class="control-grup col-12">
                            <label for="category">@lang('lang.text_category')</label>
                            <select id="category" name="categories_id" class="form-control">
                                <option value="">@lang('lang.text_select')</option>
                                @foreach ($categories as $category)
                                    <option value="{{ $category->id }}">{{ $category->category }}</option>
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
@endsection
