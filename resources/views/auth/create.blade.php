@extends('layouts.app')
@section('title', trans("lang.text_register"))
@section('content')

    <div class="container">
        <div class="row mt-4 justify-content-center">
            <div class="col-lg-6">
                <div class="card">

                    <form method="POST">
                        @csrf
                        <div class="card-header text-center">
                            <h1 class="display-6">@lang('lang.text_register') {{ mb_substr(__('lang.text_users'), 0, -1) }}</h1>
                        </div>
                        <div class="card-body">
                            <div class="form-group mb-3">
                                <label for="name">@lang("lang.text_name"):</label>
                                <input type="text" name="name" id="name" class="form-control"
                                    value="{{ old('name') }}">
                                @error('name')
                                    <span class="text-danger small">{{ $errors->first('name') }}</span>
                                @enderror
                            </div>
                            <div class="form-group mb-3">
                                <label for="email">@lang("lang.text_email"):</label>
                                <input type="email" name="email" id="email" class="form-control"
                                    value="{{ old('email') }}">
                                @error('email')
                                    <span class="text-danger small">{{ $errors->first('email') }}</span>
                                @enderror
                            </div>
                            <div class="form-group mb-3">
                                <label for="name">@lang("lang.text_password"):</label>
                                <input type="password" name="password" id="password" class="form-control">
                                @error('password')
                                    <span class="text-danger small">{{ $errors->first('password') }}</span>
                                @enderror
                            </div>
                        </div>
                        <div class="card-footer text-center">
                            <input type="submit" value="@lang('lang.text_submit')" class="btn btn-primary">
                        </div>
                    </form>

                </div>
            </div>
        </div>
    </div>

@endsection
