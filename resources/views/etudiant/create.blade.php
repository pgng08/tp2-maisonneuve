@extends('layouts.app')
@section('title',  __("lang.text_register"))
@section('content')
    <div class="row">
        <div class="col-12 text-center pt-2">
            <h1 class="display-7 mt-3">@yield('title')</h1>
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
                    {{-- <div class="card-header">
                        👤 Informations
                    </div> --}}
                    <div class="card-body">
                        <div class="control-grup col-12">
                            <label for="nom">@lang('lang.text_name'):</label>
                            <input type="text" id="nom" name="nom" class="form-control"
                                value="{{ old('nom') }}">
                            @error('nom')
                                <span class="text-danger small">{{ $errors->first('nom') }}</span>
                            @enderror
                        </div>
                        <div class="control-grup col-12">
                            <label for="adresse">@lang('lang.text_address'):</label>
                            <input type="text" id="adresse" name="adresse" class="form-control"
                                value="{{ old('adresse') }}">
                            @error('adresse')
                                <span class="text-danger small">{{ $errors->first('adresse') }}</span>
                            @enderror
                        </div>
                        <div class="control-grup col-12">
                            <label for="phone">@lang('lang.text_phone'):</label>
                            <input type="number" id="phone" name="phone" class="form-control"
                                placeholder="1234567890" min="1" value="{{ old('phone') }}">
                            @error('phone')
                                <span class="text-danger small">{{ $errors->first('phone') }}</span>
                            @enderror
                        </div>

                        <div class="control-grup col-12">
                            <label for="date_naissance">@lang('lang.text_date_birth'):</label>
                            <input type="date" id="date_naissance" name="date_naissance" class="form-control"
                                value="{{ old('date_naissance') }}">
                            @error('date_naissance')
                                <span class="text-danger small">{{ $errors->first('date_naissance') }}</span>
                            @enderror
                        </div>
                        <div class="control-grup col-12">
                            <label for="ville">@lang('lang.text_city'):</label><br>
                            <select name="ville_id" id="ville">
                                @foreach ($villes as $ville)
                                    <option value="{{ $ville->id }}">{{ $ville->nom }}</option>
                                @endforeach
                            </select>
                            @error('ville')
                                <span class="text-danger small">{{ $errors->first('ville') }}</span>
                            @enderror
                        </div>
                        <hr>
                        <div class="control-grup col-12">
                            <label for="email">@lang('lang.text_email'):</label>
                            <input type="email" id="email" name="email" class="form-control"
                                value="{{ old('email') }}">
                            @error('email')
                                <span class="text-danger small">{{ $errors->first('email') }}</span>
                            @enderror
                        </div>
                        <div class="form-group mb-3">
                            <label for="name">@lang('lang.text_password'):</label>
                            <input type="password" name="password" id="password" class="form-control">
                            @error('password')
                                <span class="text-danger small">{{ $errors->first('password') }}</span>
                            @enderror
                        </div>
                    </div>
                    <div class="card-footer text-center">
                        <input type="reset" class="btn btn-secondary" value="↺ {{ __('lang.text_reset') }}">
                        <input type="submit" class="btn btn-primary" value="✓ {{ __('lang.text_submit') }}">
                    </div>
                </form>
            </div>
        </div>
    </div>
@endsection
