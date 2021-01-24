@extends('layouts.app')

@section('content')
<div id="orderhis-wrapper">
  <div class="container">
    <p class="title">購入履歴</p>

    <div class="order-box">
      @foreach ($orders as $order)
      <details open>
        <summary>
          <div class="order-date">
            <p>注文日時</p>
            <p>{{$order->created_at}}</p>
          </div>
          <div class="order-price">
            <p>合計金額</p>
            <p>
              @foreach ($sum_prices as $sum_price)
              @if ($sum_price->order_id = $order->order_id)
              {{ floor($sum_price->sum_price) }}
              @endif
              @endforeach
            </p>
          </div>
        </summary>
        <div class="box">
          @foreach ($item_data as $item)
          @if ($item->order_id = $order->order_id)
          <ul class="item">
            <li class="image"><img src="/storage/uploads/{{ $item->image }}"></li>
            <li class="name">{{$item->item_name}}</li>
            <li class="price">{{ floor($item->price) }}</li>
            <li class="quantity">数量:{{$item->amount}}</li>
            <li class="item-detail">
              <a href="">商品画面へ</a>
            </li>
            <li></li>
          </ul>
          @endif
          @endforeach
        </div>
      </details>
      @endforeach
    </div>
  </div>
</div>
@endsection