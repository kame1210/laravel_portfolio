@extends('layouts.app')

@section('content')
<div id="list-wrapper">
	<div class="container">
		<div class="row">

			
		</div>
		{{-- モーダルウィンドウ --}}
		{{-- <p class="pop-up-p">
				<a data-remodal-target="modal" class="pop-up">絞込み</a>
			</p> --}}
		@include('layout.category_menu')
		<div id="item-list">
			<div class="item-box">
				@if (empty($items))
				<p>検索結果は0件です</p>
				@endif
				<div class="d-flex row">
					@foreach ($items as $item)
					<div class="item col-md-3">
						<div class="card">
							<a href="{!! url('item/detail/' . $item['item_id']) !!}"><img src="/storage/uploads/{{ $item['image'] }}"
									alt="{{$item['image']}}" class="card-img-top"></a>
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
				{{-- ページネーション挿入位置 --}}
			</div>
		</div>
		{{-- フッター挿入位置 --}}
	</div>
	@endsection