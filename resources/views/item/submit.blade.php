@extends('layouts.app')

@section('content')
<div class="container">
  <form action="{{ route('submit') }}" method="post" enctype="multipart/form-data">
    @csrf
    <div class="form-group row">
      <label for="item_name" class="col-md-4">{{ __('商品名')}} </label>
      <input type="text" name="item_name" value="{{ old('item_name') }}" class="col-md-8" required>

      @error('item_name')
      <span class="invalid-feedback" role="alert">
        <strong>{{ $message }}</strong>
      </span>
      @enderror
    </div>
    <div class="form-group row">
      <label for="price" class="col-md-4">{{ __('価格')}} </label>
      <input type="text" name="price" value="{{ old('price') }}" class="col-md-8" required>
      @error('price')
      <span class="invalid-feedback" role="alert">
        <strong>{{ $message }}</strong>
      </span>
      @enderror
    </div>

    <div class="form-group row">
      <label for="detail" class="col-md-4">{{ __('詳細')}} </label>
      <textarea name="detail" cols="70" rows="20" class="col-md-8" required>{{ old('detail') }}</textarea>

      @error('detail')
      <span class="invalid-feedback" role="alert">
        <strong>{{ $message }}</strong>
      </span>
      @enderror
    </div>

    <div class="form-group row">
      <label for="price" class="col-md-4">{{ __('カテゴリー')}} </label>

      @foreach ($categories as $category)
      <input type="radio" name="category" value="{{$category['ctg_id']}}" id="category_{{$category['ctg_id']}}"
        class="radio col-md-1">
      <label for="category_{{$category['ctg_id']}}" class="radio col-md-1">{{$category['category_name']}}</label>
      @endforeach

      @error('category')
      <span class="invalid-feedback" role="alert">
        <strong>{{ $message }}</strong>
      </span>
      @enderror
    </div>

    <div class="form-group row">
      <label for="price" class="col-md-4">{{ __('サブカテゴリー')}} </label>

      @foreach ($subcategories as $subcategory)
      <input type="radio" name="subcategory" value="{{$subcategory['subctg_id']}}"
        id="subcategory_{{$subcategory['subctg_id']}}" class="radio col-md-1">
      <label for="subcategory_{{$subcategory['subctg_id']}}"
        class="radio col-md-1">{{$subcategory['category_name']}}</label>
      @endforeach

      @error('subcategory')
      <span class="invalid-feedback" role="alert">
        <strong>{{ $message }}</strong>
      </span>
      @enderror
    </div>

    <div class="form-group row">
      <p class="col-md-4">{{ __('サムネイル1')}} </p>
      <input type="file" name="image[]" value="{{ old('image') }}" class="col-md-8" required>
      <p class="col-md-4">{{ __('サムネイル2')}} </p>
      <input type="file" name="image[]" value="{{ old('image') }}" class="col-md-8">
      <p class="col-md-4">{{ __('サムネイル3')}} </p>
      <input type="file" name="image[]" value="{{ old('image') }}" class="col-md-8">
      <p class="col-md-4">{{ __('サムネイル4')}} </p>
      <input type="file" name="image[]" value="{{ old('image') }}" class="col-md-8">
      <p class="col-md-4">{{ __('サムネイル5')}} </p>
      <input type="file" name="image[]" value="{{ old('image') }}" class="col-md-8">

      @error('image')
      <span class="invalid-feedback" role="alert">
        <strong>{{ $message }}</strong>
      </span>
      @enderror
    </div>

    <div class="form-group row mb-0">
      <div class="col-md-6 offset-md-4">
        <button type="submit" class="btn btn-primary">
          {{ __('Register') }}
        </button>
  </form>
</div>
@endsection