<div class="btn-like" data-item-id="{{$item['item_id']}}">
  @if(App\Like::likeExists($item['item_id']))
  <i class="fas fa-heart red">
    <span style="color:black;">
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