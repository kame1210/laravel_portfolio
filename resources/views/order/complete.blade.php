@extends('layout.layout')
@section('content')
<div id="message-wrapper">
  <div class="container">
    <h1>ご注文ありがとうございます！</h2>
      <p class="contents">ご購入いただきました商品に関しましては、<br>
        購入履歴をご確認ください。</p>
      <p class="url">
        <a href="">購入履歴を確認する</a>
      </p>
      <p class="url">
        <a href="{{ route('index') }}">トップページに移動する</a>
      </p>
  </div>
</div>
@endsection