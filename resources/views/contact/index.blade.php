@extends('layouts.app')

@section('content')
<div class="container">
  <h2 class="title">お問い合わせ</h2>
  <form action="{{ route('mailsend') }}" method="post">
    @csrf
    <div class="row">
      <div class="col-md-4">
        <span class="Required">必須</span>
        <label for="user_name">お名前</label>
      </div>
      <div class="col-md-8">
        <input type="text" name="user_name" value="{{ old('user_name') }}" required>

        @error('user_name')
        <span class="invalid-feedback" role="alert">
          <strong>{{ $message }}</strong>
        </span>
        @enderror
      </div>
    </div>

    <div class="row">
      <div class="col-md-4">
        <span class="Required">必須</span>
        <label for="email">メールアドレス</label>
      </div>
      <div class="col-md-8">
        <input type="text" name="email" value="{{ old('email') }}" required>

        @error('email')
        <span class="invalid-feedback" role="alert">
          <strong>{{ $message }}</strong>
        </span>
        @enderror
      </div>
    </div>

    <div class="row">
      <div class="col-md-4">
        <span class="Required">必須</span>
        <label for="content">お問い合わせ内容</label>
      </div>
      <div class="col-md-8">
        <textarea name="content" required>{{ old('content') }}</textarea>

        @error('content')
        <span class="invalid-feedback" role="alert">
          <strong>{{ $message }}</strong>
        </span>
        @enderror
      </div>
    </div>

    <div class="attention row">
      <i class="fas fa-exclamation-circle col"></i>
      <p class="col">送信前に内容の確認をお願いいたします。</p>
    </div>

    <input type="submit" name="send" value="送信" class="submit-btn">
  </form>
</div>
@endsection