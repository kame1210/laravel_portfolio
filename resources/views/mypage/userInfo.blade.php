<div class="container">
  <div class="meminfo-list">
    <p class="meminfo-title">お名前(氏名)</p>
    <p class="mem-info">{{$userData->family_name}}
      {{$userData->first_name}}</p>
  </div>
  <div class="meminfo-list">
    <p class="meminfo-title">お名前(かな)</p>
    <p class="mem-info">{{$userData->family_name_kana}}
      {{$userData->first_name_kana}}</p>
  </div>
  <div class="meminfo-list">
    <p class="meminfo-title">性別</p>
    <p class="mem-info">
      @if ($sex == '1')
      男性
      @elseif ($sex == '2')
      女性
      @endif
    </p>
  </div>
  <div class="meminfo-list">
    <p class="meminfo-title">生年月日</p>
    <p class="mem-info">{{$userData->year}}年
      {{$userData->month}}月
      {{$userData->day}}日</p>
  </div>
  <div class="meminfo-list">
    <p class="meminfo-title">郵便番号</p>
    <p class="mem-info">{{$userData->zip}}</p>
  </div>
  <div class="meminfo-list">
    <p class="meminfo-title">住所</p>
    <p class="mem-info">{{$userData->address1}}&ensp;{{$userData->address2}}</p>
  </div>
  <div class="meminfo-list">
    <p class="meminfo-title">メールアドレス</p>
    <p class="mem-info">{{$userData->email}}</p>
  </div>
  <div class="meminfo-list">
    <p class="meminfo-title">電話番号</p>
    <p class="mem-info">{{$userData->tel}}</p>
  </div>
  <div class="meminfo-list">
    <p class="meminfo-title">パスワード</p>
    <p class="mem-info">********</p>
  </div>
  <p class="url">
    <a href="">登録情報の変更</a>
    <p class="url">
      <a href="">退会する</a>
    </p>
</div>