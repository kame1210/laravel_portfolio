@extends('layout.layout')
@section('content')
<div class="container">
  <div class="row">
    <div class="row">
      <div class="col-md-12">
        <h2>商品発送先情報</h2>
        <p class="label">お名前(氏名)</p>
        <p class="user-data">{{$userData->family_name}}
          {{$userData->first_name}}</p>
        <p class="label">お名前(かな)</p>
        <p class="user-data">{{$userData->family_name_kana}}
          {{$userData->first_name_kana}}</p>
        <p class="label">郵便番号</p>
        <p class="user-data">{{$userData->zip}}</p>
        <p class="label">住所</p>
        <p class="user-data">{{$userData->address1}}&ensp;{{$userData->address2}}</p>
        <p class="label">メールアドレス</p>
        <p class="user-data">{{$userData->email}}</p>
        <p class="label">電話番号</p>
        <p class="user-data">{{$userData->tel}}</p>
        <p class="label">パスワード</p>
        <p class="user-data">********</p>
      </div>
    </div>

    <div class="row">
      <div class="col-md-12">
        <h2>購入商品</h2>
        <div class="row">
          @foreach ($cartItem as $item)
          <div class="item">
            <div class="image col-md-3">
              <a href=""><img src="/storage/uploads/{{ $item->image }}" alt="{{$item->item_name}}" style="width:100%;"></a>
            </div>
            <div class="item-detail col-md-7">
              <p class="name">
                <a href="{!! url('item/detail/' . $item->item_id) !!}">{{ $item->item_name }}</a>
              </p>
              <p class="price">&yen;{{number_format($item->price)}}</p>
              <p class="detail">{{$item->detail}}</p>
              <p class="amount">数量：{{$item->amount}}</p>
            </div>
          </div>
          @endforeach
        </div>
      </div>
    </div>
  </div>

  <div class="row">
    <div class="col">
      <p>購入する</p>
    </div>
  </div>
</div>
@endsection