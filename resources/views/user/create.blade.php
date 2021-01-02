@extends('layout.layout')
@section('content')
<div id="form-wrapper">
  <div class="container">
    <form method="post" action="/user">
      @csrf
      <div class="row">
        <div class="col-md-12">
          <h2 id="title">新規会員登録</h2>
        </div>
      </div>

      <div class="row">
        <div class="col-md-8">
          <div class="form-list">
            <div class="form-item">
              <p class="form-title">
                <span class="Required">必須</span>お名前(氏名)
              </p>
              <input type="text" name="family_name" value="{{ old('family_name') }}" placeholder="姓">
              <input type="text" name="first_name" value="{{ old('first_name') }}" placeholder="名">
            </div>
            @if ($errors->has('family_name'))
            <p>{{ $errors->first('family_name') }}</p>
            @endif
            @if ($errors->has('first_name'))
            <p>{{ $errors->first('first_name') }}</p>
            @endif
          </div>
          <div class="form-list">
            <div class="form-item">
              <p class="form-title">
                <span class="option">任意</span>お名前(かな)
              </p>
              <input type="text" name="family_name_kana" value="{{ old('family_name_kana') }}" placeholder="せい">
              <input type="text" name="first_name_kana" value="{{ old('first_name_kana') }}" placeholder="めい">
            </div>
          </div>
          <div class="form-list">
            <div class="form-item">
              <p class="form-title">
                <span class="Required">必須</span>性別
              </p>
              <div class="block auto-size">
                @foreach ($sexArr as $index => $label)
                <input type="radio" name="sex" value="{{$index}}" id="sex_{{$index}}">
                <label for="sex_{{$index}}">{{$label}}</label>
                @endforeach
              </div>
              @if ($errors->has('sex'))
              <p>{{ $errors->first('sex') }}</p>
              @endif
            </div>
          </div>
          <div class="form-list">
            <div class="form-item">
              <p class="form-title">
                <span class="Required">必須</span>生年月日
              </p>
              <select name="year" class="select-btn select-auto">
                @foreach ($yearArr as $index => $label)
                <option value="{{$index}}">{{$label}}</option>
                @endforeach
              </select>
              <select name="month" class="select-btn">
                @foreach ($monthArr as $index => $label)
                <option value="{{$index}}">{{$label}}</option>
                @endforeach
              </select>
              <select name="day" class="select-btn">
                @foreach ($dayArr as $index => $label)
                <option value="{{$index}}">{{$label}}</option>
                @endforeach
              </select>
            </div>
            @if ($errors->has('year'))
            <p>{{ $errors->first('year') }}</p>
            @endif
            @if ($errors->has('month'))
            <p>{{ $errors->first('month') }}</p>
            @endif
            @if ($errors->has('day'))
            <p>{{ $errors->first('day') }}</p>
            @endif
          </div>
          <div class="form-list">
            <div class="form-item">
              <p class="form-title margin-title">
                <span class="Required">必須</span>郵便番号
              </p>
              <div class="zip-wrap">
                <input type="text" name="zip" value="{{ old('zip') }}" id="zip" size="7" maxlength="7"
                  id="address-form">
                <input type="button" name="address_search" id="address_search" value="〒から住所を検索する">
              </div>
              @if ($errors->has('zip'))
              <p>{{ $errors->first('zip') }}</p>
              @endif
            </div>
          </div>
          <div class="form-list">
            <div class="form-item">
              <p class="form-title margin-title">
                <span class="Required">必須</span>住所
              </p>
              <div class="block">
                <input type="text" name="address1" value="{{ old('address1') }}" id="address" class="address-input"
                  placeholder="市町村区~番地まで">
                <input type="text" name="address2" value="{{ old('address2') }}" id="address2" class="address-input"
                  placeholder="マンション名や部屋番号">
              </div>
              @if ($errors->has('address1'))
              <p>{{ $errors->first('address1') }}</p>
              @endif
            </div>
          </div>
          <div class="form-list">
            <div class="form-item">
              <p class="form-title">
                <span class="Required">必須</span>メールアドレス
              </p>
              <input type="text" name="email" value="{{ old('email') }}">
            </div>
            @if ($errors->has('email'))
            <p>{{ $errors->first('email') }}</p>
            @endif
          </div>
          <div class="form-list">
            <div class="form-item">
              <p class="form-title">
                <span class="Required">必須</span>電話番号
              </p>
              <input type="text" name="tel" value="{{ old('tel') }}" size="11" maxlength="11">
            </div>
            @if ($errors->has('tel'))
            <p>{{ $errors->first('tel') }}</p>
            @endif
          </div>
          <div class="form-list">
            <div class="form-item">
              <p class="form-title">
                <span class="Required">必須</span>パスワード
              </p>
              <div class="block">
                <input type="password" name="password" value="" id="password">
                <span>パスワードを表示する</span>
                <input type="checkbox" id="passcheck">
              </div>
              @if ($errors->has('password'))
              <p>{{ $errors->first('password') }}</p>
              @endif
            </div>
          </div>
          <input type="submit" name="confirm" value="登録確認" class="submit-btn">
        </div>
      </div>
    </form>
  </div>
</div>
@endsection