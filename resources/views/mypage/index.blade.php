@extends('layouts.app')

@section('content')
<div class="container">
  {{-- <p class="title">マイページ</p> --}}
  <div class="row content">
    <div class="col-md-12">
      <div class="row">
        <div class="card col-md-3 page-box">
          <div class="card-body">
            <h5 class="card-title"><a href="{{ route('userInfo') }}">会員情報</a></h5>
            <i class="far fa-address-card fa-4x"></i>
            <p class="card-text">会員情報の確認</p>
          </div>
        </div>
        <div class="card col-md-3 page-box">
          <div class="card-body">
            <h5 class="card-title"><a href="{{ route('likeItem') }}">いいねリスト</a></h5>
            <i class="far fa-heart fa-4x"></i>
            <p class="card-text">いいねした商品を確認</p>
          </div>
        </div>
        <div class="card col-md-3 page-box">
          <div class="card-body">
            <h5 class="card-title"><a href="{{ route('submitItem') }}">出品リスト</a></h5>
            <i class="far fa-list-alt fa-4x"></i>
            <p class="card-text">出品した商品を確認</p>
          </div>
        </div>
      </div>
      <div class="row">
        <div class="card col-md-3 page-box">
          <div class="card-body page-box">
            <h5 class="card-title"><a href="{{ route('cart') }}">買い物かご</a></h5>
            <i class="fas fa-shopping-cart fa-4x"></i>
            <p class="card-text">買い物カゴの確認</p>
          </div>
        </div>
        <div class="card col-md-3 page-box">
          <div class="card-body">
            <h5 class="card-title"><a href="{{ route('history') }}">購入履歴</a></h5>
            <i class="fas fa-clipboard-list fa-4x"></i>
            <p class="card-text">購入した商品の履歴を確認</p>
          </div>
        </div>
        <div class="card col-md-3 page-box">
          <div class="card-body">
            <h5 class="card-title"><a href="{{ route('logout') }}"
                onclick="event.preventDefault();document.getElementById('logout-form').submit();">ログアウト</a>
            </h5>
            <form id="logout-form" action="{{ route('logout') }}" method="POST" class="d-none">
              @csrf
            </form>
            <i class="fas fa-sign-out-alt fa-4x"></i>
            <p class="card-text">ログアウトします。</p>
          </div>
        </div>
      </div>
    </div>
  </div>
</div>
@endsection