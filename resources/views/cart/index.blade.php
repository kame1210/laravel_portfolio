@extends('layout.layout')

@section('content')
<div class="container">
  <button id="back-btn">
    <a href="{{ route('list') }}">商品一覧に戻る</a>
  </button>
  <div id="cart-list">
    @if (session('error'))
        <p style="color:red;">{{ session('error') }}</p>
    @endif
    <p class="cart-info">カート内商品数 :
      @if ($sumAmount !== 0)
      {{$sumAmount}}個
      @else
      0個
      @endif
      合計金額 : &yen;{{ number_format($sumPrice) }}
    </p>
    {{-- {% if dataArr | length == 0 %}
    <p class="cart-info" style="color:red;">{{ errMsg }}</p>
    {% else %} --}}
    @foreach ($cartItem as $item)
    <div class="item">
      <div class="image">
        <a href=""><img src="/storage/uploads/{{ $item->image }}" alt="{{$item->item_name}}"></a>
      </div>
      <div class="item-detail">
        <p class="name">
          <a href="{!! url('item/detail/' . $item->item_id) !!}">{{ $item->item_name }}</a>
        </p>
        <p class="price">&yen;{{number_format($item->price)}}</p>
        <p class="amount">現在の数量：{{$item->amount}}
          <form action="{{ url('/cart/update') }}" method="post" class="amount-form">
            @csrf
            <select name="amount" class="amount-select">
              @foreach ($amounts as $key => $amount)
              <option value="{{ $key }}">{{$amount}}</option>
              @endforeach
            </select>
            <input type="hidden" name="crt_id" value="{{$item->crt_id}}">
            <input type="submit" name="update" value="数量変更">
          </form>
        </p>
        <p class="delete">
          <a href="{!! url('/cart/' . $item->crt_id ) !!}">カートから削除</a>
        </p>
      </div>
    </div>
    @endforeach
  </div>
  <div>
    {{-- <form action="{{ route('order') }}" method="post"> --}}
      {{-- <input type="hidden" name="sumPrice" value="{{sumPrice}}">
      <input type="hidden" name="sumNum" value="{{sumNum}}"> --}}
      <button onclick="location.href='{{ route('order') }}'">注文確認画面</button>
  </div>
  </form>
</div>
@endsection