@extends('layout.layout')

@section('content')
<div class="container">
  {{-- <input type="button" name="back" value="商品一覧へ戻る" onclick="history.back();return false" id="back-btn">
  <input type="hidden" name="entry_url" value="" id="entry_url"> --}}
  <div class="item-flex">
    <div class="slider-area">
      <div class="item-image">
        <img src="/storage/uploads/{{ $itemDetail['image'] }}" class="image">
      </div>
      {{-- <div class="item-nav slider-nav">
        {% for image in itemData.image %}
          <img src="{{constant('portfolio\\Bootstrap::ENTRY_URL')}}upimages/{{image}}" alt="{{image}}" class="image">
      {% endfor %}
    </div> --}}
  </div>
  <div class="item-detail">
    <ul class="detail">
      <li class="name">{{$itemDetail['item_name']}}</li>
      <li class="price">&yen;{{$itemDetail['price']}}</li>
      <li class="image-detail">{{$itemDetail['detail']}}</li>
      <input type="hidden" name="item_id" id="item_id" value="{{$itemDetail['item_id']}}">
    </ul>
    <div class="cart-in">
      <input type="button" name="cart_in" value="ショッピングカートへ入れる" id="cart-btn">
    </div>
  </div>
</div>
</div>
@endsection