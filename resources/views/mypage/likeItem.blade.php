@extends('layouts.app')

@section('content')
<div class="container">
  {{-- <h2 class="title">いいねリスト</h2> --}}
  <div class="row content">
    <div class="col-md-3">
      @include('mypage.sidebar')
    </div>
    <div class="col-md-9">
      <div class="row">
        @foreach ($like_item as $like)
        <div class="col-md-3">
          <a href="{!! url('item/detail/' . $like[0]->item_id) !!}">
            <img src="/storage/uploads/{{ $like[0]->image }}" alt="{{$like[0]->image}}" class="card-img-top"></a>
          <div class="card-title name">
            <a href="{!! url('like/detail/' . $like[0]->item_id) !!}">{{ $like[0]->like_name }}</a>
          </div>
          <div class="card-text price">&yen;{{floor($like[0]->price)}}</div>
        </div>
        @endforeach
      </div>
    </div>
  </div>
</div>
@endsection