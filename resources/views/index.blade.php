@extends('layouts.app')

@section('content')
<div id="index-wrapper">
  <div class="container">
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
        <div class="row">
          @foreach ($items as $item)
          <div class="col-md-3 item">
            <div class="card" style="width:17rem;">
              <a href="{!! url('item/detail/' . $item['item_id']) !!}">
                <img src="/storage/uploads/{{ $item['image'] }}" class="card-img-top" width="100%" height="180"
                  alt="{{$item['image']}}"></a>
              <div class="card-body">
                <h5 class="card-title name">
                  <a href="{!! url('item/detail/' . $item['item_id']) !!}">{{ $item['item_name'] }}</a>
                </h5>
                <p class="card-text price">&yen;{{floor($item['price'])}}</p>
                <div class="card-text likes">
                  <div class="btn-like" data-item-id="{{$item['item_id']}}">
                    @if(My_function::like_exists(Auth::id(), 1))
                    <i class="fas red fa-heart" style="color:red;">
                      <span>
                        @foreach ($like_count as $like)
                        @if ($like['item_id'] === $item['item_id'])
                        {{ $like['likes'] }}
                        @endif
                        @endforeach
                      </span>
                    </i>
                    @else
                    <i class="far fa-heart">
                      <span>
                        @foreach ($like_count as $like)
                        @if ($like['item_id'] === $item['item_id'])
                        {{ $like['likes'] }}
                        @endif
                        @endforeach
                      </span>
                    </i>
                    @endif
                  </div>
                </div>
              </div>
            </div>
          </div>
          @endforeach
        </div>
      </div>
    </div>

    {{-- <div class="row block-item">
      <h2 class="ctg-name">{{ $categories[0]['category_name'] }}</h2>
    <div class="item-list row">
      @foreach ($items as $item)
      <div class="col-md-3 item">
        <ul>
          <li class="image">
            <a href="{!! url('item/detail/' . $item['item_id']) !!}">
              <img src="/storage/uploads/{{ $item['image'] }}" alt="{{$item['image']}}"></a>
          </li>
          <li class="name">
            <a href="{!! url('item/detail/' . $item['item_id']) !!}">{{ $item['item_name'] }}</a>
          </li>
          <li class="price">&yen;{{floor($item['price'])}}</li>
          <li class="likes">
            <div class="btn-like" data-item-id="{{$item['item_id']}}">
              @if(My_function::like_exists(Auth::id(), 1))
              <i class="fas red fa-heart" style="color:red;">
                <span>
                  @foreach ($like_count as $like)
                  @if ($like['item_id'] === $item['item_id'])
                  {{ $like['likes'] }}
                  @endif
                  @endforeach
                </span>
              </i>
              @else
              <i class="far fa-heart">
                <span>
                  @foreach ($like_count as $like)
                  @if ($like['item_id'] === $item['item_id'])
                  {{ $like['likes'] }}
                  @endif
                  @endforeach
                </span>
              </i>
              @endif
          </li>
        </ul>
      </div>
      @endforeach
    </div>
  </div> --}}

  <div class="row block-item">
    <h2 class="ctg-name">{{ $categories[1]['category_name'] }}</h2>
    <div class="item-list">
      @foreach ($howtoItems as $item)
      <div class="col item">
        <ul>
          <li class="image">
            <a href="{!! url('item/detail/' . $item['item_id']) !!}">
              <img src="/storage/uploads/{{ $item['image'] }}" alt="{{$item['image']}}"></a>
          </li>
          <li class="name">
            <a href="{!! url('item/detail/' . $item['item_id']) !!}">{{ $item['item_name'] }}</a>
          </li>
          <li class="price">&yen;{{floor($item['price'])}}</li>
          <li class="likes">
            <div class="btn-like" data-item-id="{{$item['item_id']}}">
              @if(My_function::like_exists(Auth::id(), 1))
              <i class="fas red fa-heart" style="color:red;">
                <span>
                  @foreach ($like_count as $like)
                  @if ($like['item_id'] === $item['item_id'])
                  {{ $like['likes'] }}
                  @endif
                  @endforeach
                </span>
              </i>
              @else
              <i class="far fa-heart">
                <span>
                  @foreach ($like_count as $like)
                  @if ($like['item_id'] === $item['item_id'])
                  {{ $like['likes'] }}
                  @endif
                  @endforeach
                </span>
              </i>
              @endif
          </li>
        </ul>
      </div>
      @endforeach
    </div>
  </div>

  <div class="row block-item">
    <h2 class="ctg-name">{{ $categories[2]['category_name'] }}</h2>
    <div class="item-list">
      @foreach ($eventItems as $item)
      <div class="col item">
        <ul>
          <li class="image">
            <a href="{!! url('item/detail/' . $item['item_id']) !!}">
              <img src="/storage/uploads/{{ $item['image'] }}" alt="{{$item['image']}}"></a>
          </li>
          <li class="name">
            <a href="{!! url('item/detail/' . $item['item_id']) !!}">{{ $item['item_name'] }}</a>
          </li>
          <li class="price">&yen;{{floor($item['price'])}}</li>
          {{-- {% include "viewlikes.html.twig" %} --}}
          <li class="likes">
            <div class="btn-like" data-item-id="{{$item['item_id']}}">
              @if(My_function::like_exists(Auth::id(), 1))
              <i class="fas red fa-heart" style="color:red;">
                <span>
                  @foreach ($like_count as $like)
                  @if ($like['item_id'] === $item['item_id'])
                  {{ $like['likes'] }}
                  @endif
                  @endforeach
                </span>
              </i>
              @else
              <i class="far fa-heart">
                <span>
                  @foreach ($like_count as $like)
                  @if ($like['item_id'] === $item['item_id'])
                  {{ $like['likes'] }}
                  @endif
                  @endforeach
                </span>
              </i>
              @endif
          </li>
        </ul>
      </div>
      @endforeach
    </div>
  </div>
</div>
</div>
@endsection


{{-- <button class="ctg-btn" type="button">
      <a href="{{constant('portfolio\\Bootstrap::ENTRY_URL')}}list.php?ctg_id={{cateArr[0].ctg_id}}&page=1">MORE!</a>
</button>
</div> --}}

{{-- <div class="block-item">
    <p class="ctg-name">
      {{ cateArr[1].category_name }}
</p>

<div class="item-list">
  {% for value in itemArr[1] %}
  <div class="item">
    <ul>
      <li class="image">
        <a href="{{constant('portfolio\\Bootstrap::ENTRY_URL')}}itemdetail.php?item_id={{value.item_id}}"><img
            src="{{constant('portfolio\\Bootstrap::ENTRY_URL')}}upimages/{{value.image.0}}"
            alt="{{value.item_name}}"></a>
      </li>
      <li class="name">
        <a
          href="{{constant('portfolio\\Bootstrap::ENTRY_URL')}}itemdetail.php?item_id={{value.item_id}}">{{value.item_name}}</a>
      </li>

      <li class="price">&yen;{{value.price|number_format(0, '.', ',')}}</li>
      {% include "viewlikes.html.twig" %}
    </ul>
  </div>
  {% endfor %}
</div>

<button class="ctg-btn" type="button">
  <a href="{{constant('portfolio\\Bootstrap::ENTRY_URL')}}list.php?ctg_id={{cateArr[1].ctg_id}}&page=1">MORE!</a>
</button>
</div>

<div class="block-item">
  <p class="ctg-name">
    {{ cateArr[2].category_name }}
  </p>

  <div class="item-list">
    {% for value in itemArr[2] %}
    <div class="item">
      <ul>
        <li class="image">
          <a href="{{constant('portfolio\\Bootstrap::ENTRY_URL')}}itemdetail.php?item_id={{value.item_id}}"><img
              src="{{constant('portfolio\\Bootstrap::ENTRY_URL')}}upimages/{{value.image.0}}"
              alt="{{value.item_name}}"></a>
        </li>
        <li class="name">
          <a
            href="{{constant('portfolio\\Bootstrap::ENTRY_URL')}}itemdetail.php?item_id={{value.item_id}}">{{value.item_name}}</a>
        </li>
        <li class="price">&yen;{{value.price|number_format(0, '.', ',')}}</li>
        {% include "viewlikes.html.twig" %}
      </ul>
    </div>
    {% endfor %}
  </div>

  <button class="ctg-btn" type="button">
    <a href="{{constant('portfolio\\Bootstrap::ENTRY_URL')}}list.php?ctg_id={{cateArr[2].ctg_id}}&page=1">MORE!</a>
  </button>
</div>

<div id="subcate-box">
  <p class="subcate-name">
    サブカテゴリー
  </p>
  <div class="container">
    {% for label in subCateArr %}
    <button type="button" class="subcategory">
      <a
        href="{{constant('portfolio\\Bootstrap::ENTRY_URL')}}list.php?subctg_id={{ label.ctg_id }}&page=1">{{ label.category_name }}</a>
    </button>
    {% endfor %}
  </div>
</div> --}}
{{-- </div>
@endsection --}}

{{-- <div class="container ops-main">
    <div class="row">
      <div class="col-md-12">
        <h3 class="ops-title">商品一覧</h3>
      </div>
    </div>
    <div class="row">
      <div class="col-md-11 col-md-offset-1">
        <table class="table text-center">
          <tr>
            <th class="text-center">ID</th>
            <th class="text-center">商品名</th>
            <th class="text-center">価格</th>
          </tr>
          @foreach($items as $item)
          <tr>
            <td>
              <a href="/item/{{ $item->item_id }}/edit">{{ $item->item_id }}</a>
</td>
<td>{{ $item->item_name }}</td>
<td>{{ $item->price }}</td>
<td>
  <form action="/item/{{ $item->id }}" method="post">
    <input type="hidden" name="_method" value="DELETE">
    <input type="hidden" name="_token" value="{{ csrf_token() }}">
    <button type="submit" class="btn btn-xs btn-danger" aria-label="Left Align"><span
        class="glyphicon glyphicon-trash"></span></button>
  </form>
</td>
</tr>
@endforeach
</table>
<div><a href="/book/create" class="btn btn-default">新規作成</a></div>
</div>
</div> --}}