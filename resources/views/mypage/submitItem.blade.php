@extends('layouts.app')

@section('content')
<div id="submit-item">
  <div class="container">
    <h2 class="title float">出品リスト</h2>
    <input type="button" name="back" value="商品を登録する" onclick="" class="submit-btn">
    <div id="item-list">
      <div class="row">
        @foreach ($item_data as $item)
        <div class="col-md-3 item">
          <div class="card">
            <a href=""><img src="/storage/uploads/{{ $item['image'][0] }}" alt="サムネイル"></a>
            <div class="card-body">
              <a href="">{{$item['item_name']}}</a>
              <h5 class="card-title name"></h5>
              <p class="card-text price">&yen;{{floor($item['price'])}}</p>
            </div>
          </div>
          {{-- <li class="a-url">
            <a href="{{constant('portfolio\\Bootstrap::ENTRY_URL')}}myitemdetail.php?item_id={{value.item_id}}"></a>
          </li> --}}
        </div>
        @endforeach
      </div>
    </div>
  </div>
</div>
</div>
@endsection