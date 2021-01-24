@extends('layouts.app')

@section('content')
<div class="container">
  <p class="title">マイページ</p>

  <div class="menu-box">
    <ul class="box">
      <li class="box-title"><a href="{{ route('userInfo') }}">会員情報</a></li>
      <li>
        <i class="far fa-address-card fa-4x"></i>
      </li>
      <li>会員情報の確認</li>
    </ul>
    <ul class="box">
      <li class="box-title">お気に入りリスト</li>
      <li>
        <i class="far fa-star fa-4x"></i>
      </li>
      <li>お気に入りリストの確認</li>
      <a href=""></a>
    </ul>
    <ul class="box">
      <li class="box-title">出品リスト</li>
      <li>
        <i class="far fa-list-alt fa-4x"></i>
      </li>
      <li>出品リストの確認</li>
      <a href=""></a>
    </ul>
  </div>
  <div class="menu-box">
    <ul class="box">
      <li class="box-title">買い物かご</li>
      <li>
        <i class="fas fa-shopping-cart fa-4x"></i>
      </li>
      <li>買い物かごを確認</li>
      <a href=""></a>
    </ul>
    <ul class="box">
      <li class="box-title">購入履歴</li>
      <li>
        <i class="fas fa-clipboard-list fa-4x"></i>
      </li>
      <li>購入履歴を確認</li>
      <a href=""></a>
    </ul>
    <ul class="box">
      <li><a class="dropdown-item" href="{{ route('logout') }}" onclick="event.preventDefault();
      document.getElementById('logout-form').submit();">
          {{ __('ログアウト') }}
        </a></li>

      <form id="logout-form" action="{{ route('logout') }}" method="POST" class="d-none">
        @csrf
      </form>
      {{-- <li class="box-title"><a href="{{ route('logout') }}">ログアウト</a></li> --}}
      <li>
        <i class="fas fa-sign-out-alt fa-4x"></i>
      </li>
      <li>ログアウトします</li>
    </ul>
  </div>
</div>
@endsection