@extends('layouts.app')

@section('content')
<div class="container">
  <h2 class="title float">出品リスト</h2>
  <input type="button" name="back" value="商品を登録する" onclick="" class="submit-btn">
  <div id="item-list">
    <div class="item-box">
      @foreach ($itemData as $item)
      <div class="item">
        <ul>
          <li class="image">
            <a href=""><img
                src="/storage/uploads/{{ $item['image'] }}"
                alt=""></a>
          </li>
          {{-- <li class="image">
            <a href="{{constant('portfolio\\Bootstrap::ENTRY_URL')}}myitemdetail.php?item_id={{value.item_id}}"><img
                src="{{constant('portfolio\\Bootstrap::ENTRY_URL')}}upimages/{{value.image.0}}"
                alt="{{value.item_name}}"></a>
          </li> --}}
          <li class="name">
            <a
              href="">{{$item['item_name']}}</a>
          </li>
          <li class="price">&yen;{{$item['price']}}</li>
          <li class="a-url">
            {{-- <a href="{{constant('portfolio\\Bootstrap::ENTRY_URL')}}myitemdetail.php?item_id={{value.item_id}}"></a> --}}
          </li>
        </ul>
      </div>
      @endforeach
    </div>
  </div>
</div>
@endsection