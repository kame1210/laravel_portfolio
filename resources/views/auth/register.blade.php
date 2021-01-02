@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">{{ __('新規会員登録') }}</div>

                <div class="card-body">
                    <form method="POST" action="{{ route('register') }}">
                        @csrf

                        <div class="form-group row">
                            <label for="name" class="col-md-4 col-form-label text-md-right">{{ __('名前(氏)') }}</label>

                            <div class="col-md-6">
                                <input id="name" type="text" class="form-control @error('name') is-invalid @enderror"
                                    name="family_name" value="{{ old('family_name') }}" required
                                    autocomplete="family_name" autofocus>

                                @error('family_name')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                                @enderror
                            </div>
                        </div>

                        <div class="form-group row">
                            <label for="name" class="col-md-4 col-form-label text-md-right">{{ __('名前(名)') }}</label>

                            <div class="col-md-6">
                                <input id="name" type="text" class="form-control @error('name') is-invalid @enderror"
                                    name="first_name" value="{{ old('first_name') }}" required autocomplete="first_name"
                                    autofocus>

                                @error('first_name')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                                @enderror
                            </div>
                        </div>

                        <div class="form-group row">
                            <label for="family_name_kana"
                                class="col-md-4 col-form-label text-md-right">{{ __('なまえ(氏)') }}</label>

                            <div class="col-md-6">
                                <input id="family_name_kana" type="text"
                                    class="form-control @error('family_name_kana') is-invalid @enderror"
                                    name="family_name_kana" value="{{ old('family_name_kana') }}"
                                    autocomplete="family_name_kana">

                                @error('family_name_kana')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                                @enderror
                            </div>
                        </div>
                        <div class="form-group row">
                            <label for="first_name_kana"
                                class="col-md-4 col-form-label text-md-right">{{ __('なまえ(名)') }}</label>

                            <div class="col-md-6">
                                <input id="first_name_kana" type="text"
                                    class="form-control @error('first_name_kana') is-invalid @enderror"
                                    name="first_name_kana" value="{{ old('first_name_kana') }}"
                                    autocomplete="first_name_kana">

                                @error('first_name_kana')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                                @enderror
                            </div>
                        </div>

                        <div class="form-group row">
                            <label for="sex" class="col-md-4 col-form-label text-md-right">{{ __('性別') }}</label>

                            <div class="row">
                                @foreach ($sexArr as $index => $label)
                                <div class="col-md-6">
                                    <input id="sex_{{ $index }}" type="radio"
                                        class="form-control @error('sex') is-invalid @enderror" name="sex"
                                        value="{{ $index }}" required autocomplete="sex" style="font-size:16px;">
                                    <label for="sex_{{$index}}">{{$label}}</label>
                                </div>
                                @endforeach

                                @error('sex')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                                @enderror
                            </div>
                        </div>
                        <div class="form-group row">
                            <label for="year" class="col-md-4 col-form-label text-md-right">{{ __('生年月日') }}</label>

                            <div class="col-md-2">
                                <select name="year" id="" class="form-control @error('year') is-invalid @enderror"
                                    name="year" required autocomplete="year">
                                    @foreach ($yearArr as $index => $label)
                                    <option value="{{ $index }}">{{ $label }}</option>
                                    @endforeach
                                </select>

                                @error('year')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                                @enderror
                            </div>

                            <div class="col-md-2">
                                <select name="month" id="" class="form-control @error('month') is-invalid @enderror"
                                    name="month" required autocomplete="month">
                                    @foreach ($monthArr as $index => $label)
                                    <option value="{{ $index }}">{{ $label }}</option>
                                    @endforeach
                                </select>

                                @error('month')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                                @enderror
                            </div>

                            <div class="col-md-2">
                                <select name="day" id="" class="form-control @error('day') is-invalid @enderror"
                                    name="day" required autocomplete="day">
                                    @foreach ($dayArr as $index => $label)
                                    <option value="{{ $index }}">{{ $label }}</option>
                                    @endforeach
                                </select>

                                @error('day')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                                @enderror
                            </div>
                        </div>
                        <div class="form-group row">
                            <label for="zip" class="col-md-4 col-form-label text-md-right">{{ __('郵便番号') }}</label>

                            <div class="col-md-6">
                                <input id="zip" type="zip" class="form-control @error('zip') is-invalid @enderror"
                                    name="zip" value="{{ old('zip') }}" required autocomplete="zip">

                                @error('zip')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                                @enderror
                            </div>
                        </div>
                        <div class="form-group row">
                            <label for="address1" class="col-md-4 col-form-label text-md-right">{{ __('住所1') }}</label>

                            <div class="col-md-6">
                                <input id="address1" type="address1"
                                    class="form-control @error('address1') is-invalid @enderror" name="address1"
                                    value="{{ old('address1') }}" required autocomplete="address1">

                                @error('address1')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                                @enderror
                            </div>
                        </div>
                        <div class="form-group row">
                            <label for="address2" class="col-md-4 col-form-label text-md-right">{{ __('住所2') }}</label>

                            <div class="col-md-6">
                                <input id="address2" type="address2"
                                    class="form-control @error('address2') is-invalid @enderror" name="address2"
                                    value="{{ old('address2') }}" autocomplete="address2">

                                @error('address2')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                                @enderror
                            </div>
                        </div>
                        <div class="form-group row">
                            <label for="tel" class="col-md-4 col-form-label text-md-right">{{ __('電話番号') }}</label>

                            <div class="col-md-6">
                                <input id="tel" type="tel" class="form-control @error('tel') is-invalid @enderror"
                                    name="tel" value="{{ old('tel') }}" required autocomplete="tel">

                                @error('tel')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                                @enderror
                            </div>
                        </div>

                        <div class="form-group row">
                            <label for="email" class="col-md-4 col-form-label text-md-right">{{ __('メールアドレス') }}</label>

                            <div class="col-md-6">
                                <input id="email" type="email" class="form-control @error('email') is-invalid @enderror"
                                    name="email" value="{{ old('email') }}" required autocomplete="email">

                                @error('email')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                                @enderror
                            </div>
                        </div>

                        <div class="form-group row">
                            <label for="password"
                                class="col-md-4 col-form-label text-md-right">{{ __('Password') }}</label>

                            <div class="col-md-6">
                                <input id="password" type="password"
                                    class="form-control @error('password') is-invalid @enderror" name="password"
                                    required autocomplete="new-password">

                                @error('password')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                                @enderror
                            </div>
                        </div>

                        <div class="form-group row">
                            <label for="password-confirm"
                                class="col-md-4 col-form-label text-md-right">{{ __('Confirm Password') }}</label>

                            <div class="col-md-6">
                                <input id="password-confirm" type="password" class="form-control"
                                    name="password_confirmation" required autocomplete="new-password">
                            </div>
                        </div>

                        <div class="form-group row mb-0">
                            <div class="col-md-6 offset-md-4">
                                <button type="submit" class="btn btn-primary">
                                    {{ __('Register') }}
                                </button>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection