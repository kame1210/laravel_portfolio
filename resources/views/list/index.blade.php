@extends('layouts.app')
@extends('layout.category_menu')

@section('content')
<div class="container">
		<div id="list-wrapper">
      {{-- 絞込設定 --}}
			{{-- <p class="pop-up-p">
				<a data-remodal-target="modal" class="pop-up">絞込み</a>
			</p> --}}
			<div id="item-list">
				<div class="item-box">
          @if (empty($items))
          <p>検索結果は0件です</p>
          @endif
          @foreach ($items as $item)
          <div class="item">
							<ul>
								<li class="image">
									<a href="{!! url('item/detail/' . $item['item_id']) !!}"><img src="/storage/uploads/{{ $item['image'] }}" alt="{{$item['image']}}"></a>
								</li>
								<li class="name">
									<a href="{!! url('item/detail/' . $item['item_id']) !!}"</a>
								</li>
								<li class="price">&yen;{{$item['price']}}</li>
								{{-- {% include "viewlikes.html.twig" %} --}}
							</ul>
						</div>
          @endforeach
				</div>
				{{-- {% include "page.html.twig" %} --}}
			</div>
		</div>
    {{-- {% include "footer.html.twig" %} --}}
  </div>
@endsection