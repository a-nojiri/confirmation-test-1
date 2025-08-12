@extends('layouts.app')

@section('css')
<link rel="stylesheet" href="{{ asset('css/index.css') }}">
@endsection

@section('content')
<div class="contact-form__content">
  <div class="contact-form__title">FashionablyLate</div>

  <div class="contact-form__heading">
    <h2>Contact</h2>
  </div>

  <form action="{{ route('contacts.confirm') }}" method="post">
    @csrf

    <div class="form__group">
      <div class="form__group-title">
        <span class="form__label--item">お名前</span>
        <span class="form__label--required">※</span>
      </div>
      <div class="form__group-content name">
        <input type="text" name="last_name" value="{{ old('last_name') }}" placeholder="姓">
        <input type="text" name="first_name" value="{{ old('first_name') }}" placeholder="名">
      </div>
      <div class="form__error">
        @error('last_name'){{ $message }}@enderror
        @error('first_name'){{ $message }}@enderror
      </div>
    </div>

    <div class="form__group">
      <div class="form__group-title">
        <span class="form__label--item">性別</span>
        <span class="form__label--required">※</span>
      </div>
      <div class="form__group-content gender">
        <label><input type="radio" name="gender" value="male" {{ old('gender') == 'male' ? 'checked' : '' }}> 男性</label>
        <label><input type="radio" name="gender" value="female" {{ old('gender') == 'female' ? 'checked' : '' }}> 女性</label>
        <label><input type="radio" name="gender" value="other" {{ old('gender') == 'other' ? 'checked' : '' }}> その他</label>
      </div>
      <div class="form__error">@error('gender'){{ $message }}@enderror</div>
    </div>

    <div class="form__group">
      <div class="form__group-title">
        <span class="form__label--item">メールアドレス</span>
        <span class="form__label--required">※</span>
      </div>
      <div class="form__group-content">
        <input type="email" name="email" value="{{ old('email') }}">
      </div>
      <div class="form__error">@error('email'){{ $message }}@enderror</div>
    </div>

    <div class="form__group">
      <div class="form__group-title">
        <span class="form__label--item">電話番号</span>
        <span class="form__label--required">※</span>
      </div>
      <div class="form__group-content">
        <input type="text" name="tel" value="{{ old('tel') }}">
      </div>
      <div class="form__error">@error('tel'){{ $message }}@enderror</div>
    </div>

    <div class="form__group">
      <div class="form__group-title">
        <span class="form__label--item">住所</span>
        <span class="form__label--required">※</span>
      </div>
      <div class="form__group-content">
        <input type="text" name="address" value="{{ old('address') }}">
      </div>
      <div class="form__error">@error('address'){{ $message }}@enderror</div>
    </div>

    <div class="form__group">
      <div class="form__group-title">
        <span class="form__label--item">建物名</span>
      </div>
      <div class="form__group-content">
        <input type="text" name="building_name" value="{{ old('building_name') }}">
      </div>
    </div>

    <div class="form__group">
      <div class="form__group-title">
        <span class="form__label--item">お問い合わせの種類</span>
        <span class="form__label--required">※</span>
      </div>
      <div class="form__group-content">
        <select name="category_id">
          <option value="">選択してください</option>
          @foreach ($categories as $category)
            <option value="{{ $category->id }}" {{ old('category_id') == $category->id ? 'selected' : '' }}>
              {{ $category->name }}
            </option>
          @endforeach
        </select>
      </div>
      <div class="form__error">@error('category_id'){{ $message }}@enderror</div>
    </div>

    <div class="form__group">
      <div class="form__group-title">
        <span class="form__label--item">お問い合わせ内容</span>
        <span class="form__label--required">※</span>
      </div>
      <div class="form__group-content">
        <textarea name="content" rows="5">{{ old('content') }}</textarea>
      </div>
      <div class="form__error">@error('content'){{ $message }}@enderror</div>
    </div>

    <div class="form__button">
      <button class="form__button-submit" type="submit">確認画面へ</button>
    </div>
  </form>
</div>
@endsection
