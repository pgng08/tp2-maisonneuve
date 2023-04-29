@extends('layouts.app')

@section('title', 'Maisonneuve - Bienvenue')

@section('content')

    <div class="text-center mt-5">
        <h1 class="display-3 mt-3">
            {{ config('app.name') }}
        </h1>
    </div>

    <div class="col-md-4 text-left mt-5">
        <p><small>@lang('lang.text_tp_title')</small></p>
        <p><small>@lang('lang.text_tp_course')</small></p>
        <p><small>@lang('lang.text_tp_description')</small></p>
        <p><small>@lang('lang.text_tp_student')</small></p>
    </div>
@endsection
