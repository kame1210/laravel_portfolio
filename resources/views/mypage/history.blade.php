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
        <div class="row">
          @foreach ($item_data as $item)
          @if ($item->order_id = $order->order_id)
          <div class="col-md-3">
            <div class="card">
              <img src="/storage/uploads/{{ $item->image }}" class="card-img-top">
              <div class="card-body">
                <div class="card-title name">{{$item->item_name}}</div>
                <div class="card-text price">{{ floor($item->price) }}</div>
                <div class="card-text amount">数量:{{$item->amount}}</div>
                <div class="item-detail">
                  <a href="">商品画面へ</a>
                </div>
              </div>
            </div>
          </div>
          @endif
          @endforeach
        </div>
      </details>
      @endforeach
    </div>
  </div>
</div>
@endsection