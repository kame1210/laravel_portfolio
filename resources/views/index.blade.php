@extends('layouts.app')

@section('content')
<div id="index-wrapper">
  <div class="container-fluid">
    <div class="row">
      <div class="col-md-12">
        <div id="top-image"><img src="/storage/images/3835521_m.jpg" alt="" style="width:100%;heght:100%;"></div>
      </div>
    </div>
    <div class="row">
      <div class="col-md-12">
        <p class="topic-message">当サイトは、個人の趣味を充実させる。<br>
          個人の趣味を世界に広げて行くためのサイトです。<br>
          あなたが興味がある分野や、キーワードを入力してください。
        </p>
      </div>
    </div>

    <div class="row">
      <div class="col">
        <form action="{{ route('list') }}" method="get" id="search-form">
          <input type="text" name="search" value="" id="sform" placeholder="キーワードを入力">
          <button id="sbtn" type="submit">
            <i class="fas fa-search"></i>
          </button>
        </form>
      </div>
    </div>

    <div class="row">
      <div class="col-md-12">
        <div class="row">
          <div class="col-md-12">
            <h2 class="ctg-name">{{ $categories[0]['category_name'] }}</h2>
          </div>
        </div>
        <div class="d-flex row">
          @foreach ($items as $item)
          <div class="col-sm-4 col-md-3 item">
            <div class="card">
              <a href="{!! url('item/detail/' . $item['item_id']) !!}">
                <img src="/storage/uploads/{{ $item['image'] }}" class="card-img-top" alt="{{$item['image']}}"></a>
              <div class="card-body">
                <h5 class="card-title name">
                  <a href="{!! url('item/detail/' . $item['item_id']) !!}">{{ $item['item_name'] }}</a>
                </h5>
                <div class="flex">
                  <p class="card-text price">&yen;{{floor($item['price'])}}</p>
                  <div class="card-text likes">
                    @include('like')
                  </div>
                </div>
              </div>
            </div>
          </div>
          @endforeach
        </div>
      </div>
    </div>

    <div class="row">
      <div class="col-md-12">
        <div class="row">
          <div class="col-md-12">
            <h2 class="ctg-name">{{ $categories[1]['category_name'] }}</h2>
          </div>
        </div>
        <div class="d-flex row">
          @foreach ($howtoItems as $item)
          <div class="col-md-3 item">
            <div class="card">
              <a href="{!! url('item/detail/' . $item['item_id']) !!}">
                <img src="/storage/uploads/{{ $item['image'] }}" class="card-img-top" alt="{{$item['image']}}"></a>
              <div class="card-body">
                <h5 class="card-title name">
                  <a href="{!! url('item/detail/' . $item['item_id']) !!}">{{ $item['item_name'] }}</a>
                </h5>
                <div class="flex">
                  <p class="card-text price">&yen;{{floor($item['price'])}}</p>
                  <div class="card-text likes">
                    @include('like')
                  </div>
                </div>
              </div>
            </div>
          </div>
          @endforeach
        </div>
      </div>
    </div>

    <div class="row">
      <div class="col-md-12">
        <div class="row">
          <div class="col-md-12">
            <h2 class="ctg-name">{{ $categories[2]['category_name'] }}</h2>
          </div>
        </div>
        <div class="d-flex row">
          @foreach ($eventItems as $item)
          <div class="col-sm-3 col-md-3 item">
            <div class="card">
              <a href="{!! url('item/detail/' . $item['item_id']) !!}">
                <img src="/storage/uploads/{{ $item['image'] }}" class="card-img-top" alt="{{$item['image']}}"></a>
              <div class="card-body">
                <h5 class="card-title name">
                  <a href="{!! url('item/detail/' . $item['item_id']) !!}">{{ $item['item_name'] }}</a>
                </h5>
                <div class="flex">

                  <p class="card-text price">&yen;{{floor($item['price'])}}</p>
                  <div class="card-text likes">
                    @include('like')
                  </div>
                </div>
              </div>
            </div>
          </div>
          @endforeach
        </div>
      </div>
    </div>
    @endsection