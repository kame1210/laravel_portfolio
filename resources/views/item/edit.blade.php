@extends('layouts.app')
@section('content')
<div class="container ops-main">
  <div class="row">
    <div class="col-md-6">
      <h2>書籍登録</h2>
    </div>
  </div>
  <div class="row">
    <div class="col-md-8 col-md-offset-1">
      <form action="/item/{{ $item->id }}" method="post">
        <!-- updateメソッドにはPUTメソッドがルーティングされているのでPUTにする -->
        <input type="hidden" name="_method" value="PUT">
        <input type="hidden" name="_token" value="{{ csrf_token() }}">
        <div class="form-group">
          <label for="name">商品名 </label>
          <input type="text" class="form-control" name="name" value="{{ $item->name }}">
        </div>
        <div class="form-group">
          <label for="price">価格</label>
          <input type="text" class="form-control" name="price" value="{{ $item->price }}">
        </div>
        <button type="submit" class="btn btn-default">登録</button>
        <a href="/book">戻る</a>
      </form>
    </div>
  </div>
</div>
@endsection