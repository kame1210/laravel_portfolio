@extends('layouts.app')

@section('content')
<div class="container">
  <h2 class="title">いいねリスト</h2>
  <div id="item-list">
    <div class="item-box">
      @foreach ($like_item as $like)
      <div class="col item">
        <ul>
          <li class="image">
            <a href="{!! url('item/detail/' . $like[0]->item_id) !!}">
              <img src="/storage/uploads/{{ $like[0]->image }}" alt="{{$like[0]->image}}"></a>
          </li>
          <li class="name">
            <a href="{!! url('like/detail/' . $like[0]->item_id) !!}">{{ $like[0]->like_name }}</a>
          </li>
          <li class="price">&yen;{{$like[0]->price}}</li>
        </ul>
      </div>
      @endforeach
    </div>
  </div>
</div>
@endsection