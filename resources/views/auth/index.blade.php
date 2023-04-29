@extends('layouts.app')
@section('title', __('lang.text_login'))
@section('content')

    <div class="container">
        <div class="row mt-4 justify-content-center">
            <div class="col-lg-6">

                @if (!$errors->isEmpty())
                    <div class="alert alert-danger alert-dismissible fade show" role="alert">
                        <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                        <ul>
                            @foreach ($errors->all() as $error)
                                <li>{{ $error }}</li>
                            @endforeach
                        </ul>
                    </div>
                @endif

                <div class="card">
                    <form action="{{ route('authentication') }}" method="POST">
                        @csrf
                        <div class="card-header text-center">
                            <h1 class="display-6">@lang('lang.text_login')</h1>
                        </div>
                        <div class="card-body">
                            <div class="form-group mb-3">
                                <label for="email">@lang('lang.text_email'):</label>
                                <input type="email" name="email" id="email" class="form-control"
                                    value="{{ old('email') }}">
                            </div>
                            <div class="form-group mb-3">
                                <label for="name">@lang('lang.text_password'):</label>
                                <input type="password" name="password" id="password" class="form-control">
                            </div>
                            <div class="form-group mb-3">
                            </div>

                        </div>
                        <div class="card-footer text-center">
                            <input type="submit" value="@lang('lang.text_login')" class="btn btn-primary">
                        </div>
                    </form>

                </div>
            </div>
        </div>
    </div>

@endsection
