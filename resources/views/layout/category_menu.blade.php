<div class="col-md-3">
  <h2>カテゴリーで絞込み</h2>

  <form action="{{ route('list') }}" method="get">
    <p>カテゴリー</p>
    <select name="ctg_id" id="ctg_id">
      <option value="">すべて</option>
      @foreach ($categories as $category)
      <option value="{{$category['ctg_id']}}">
        {{$category['category_name'] }}</option>
      @endforeach
    </select>
    <p>サブカテゴリー</p>
    <select name="subctg_id" id="subctg_id">
      <option value="">すべて</option>
      @foreach ($subcategories as $subcategory)
      <option value="{{$subcategory['subctg_id']}}">
        {{ $subcategory['category_name'] }}</option>
      @endforeach
    </select>
    {{-- <input type="hidden" name="page" value="1"> --}}
    <input type="submit" value="検索">
  </form>
  <p>フリーワードで絞込み</p>
  <form action="{{ route('list') }}" method="get" id="search-form">
    <input type="text" name="search" value="" id="free-form" placeholder="キーワードを入力">
    {{-- <input type="hidden" name="page" value="1"> --}}
    <button id="sbtn" type="submit">
      フリーワードで検索
    </button>
  </form>
</div>

{{-- モーダル実装。laravelでは一旦コメントアウト --}}
{{-- <div class="remodal" data-remodal-id="modal" data-remodal-options="hashTracking:false">
	<button data-remodal-action="close" class="remodal-close"></button>
	<div id="category-search-modal">
		<p class="modal-title">
			カテゴリーで絞込み
		</p>

		<form action="" method="get">
			<p>カテゴリー</p>
			<select name="ctg_id" id="ctg_id">
				<option value="">すべて</option>
				{% for label in cateArr %}
					<option value="{{label.ctg_id}}" {% if get.ctg_id == label.ctg_id %} selected
{% endif %}>{{ label.category_name }}</option>
{% endfor %}
</select>
<p>サブカテゴリー</p>
<select name="subctg_id" id="subctg_id">
  <option value="">すべて</option>
  {% for label in subCateArr %}
  <option value="{{label.ctg_id}}" {% if get.subctg_id == label.ctg_id %} selected {% endif %}>{{ label.category_name }}
  </option>
  {% endfor %}
</select>
<input type="hidden" name="page" value="1">
<input type="submit" value="カテゴリーで検索">
</form>
<p class="modal-title">フリーワードで絞込み</p>
<form action="" method="get" id="search-form">
  <input type="text" name="search" value="" id="free-form" placeholder="キーワードを入力">
  <input type="hidden" name="page" value="1">
  <button id="sbtn" type="submit">
    フリーワードで検索
  </button>
</form>
{# <button data-remodal-action="cancel" class="remodal-cancel">Cancel</button>
		<button data-remodal-action="confirm" class="remodal-confirm">OK</button> #}
</div>
</div> --}}