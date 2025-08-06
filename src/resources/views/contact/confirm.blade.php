@extends('layouts.app')

@section('css')
<link rel="stylesheet" href="{{ asset('css/confirm.css') }}">
@endsection

@section('content')
  <div class="confirm-form__content">
    <div class="confirm-form__title">FashionablyLate</div>
    <div class="confirm-form__heading">
      <h2>Confirm</h2>
    </div>

    <form class="form" action="/contacts/send" method="post">
      @csrf
      <table class="form__table">
        <tr><th>お名前</th><td>{{ $contact['last_name'] }} {{ $contact['first_name'] }}</td></tr>
      @php
        $genderLabel = ['male' => '男性', 'female' => '女性', 'other' => 'その他'];
      @endphp
        <tr><th>性別</th><td>{{ $genderLabel[$contact['gender']] ?? '' }}</td></tr>
        <tr><th>メールアドレス</th><td>{{ $contact['email'] }}</td></tr>
        <tr><th>電話番号</th><td>{{ $contact['tel'] }}</td></tr>
        <tr><th>住所</th><td>{{ $contact['address'] }}</td></tr>
        <tr><th>建物名</th><td>{{ $contact['building_name'] }}</td></tr>
        <tr><th>お問い合わせの種類</th><td>{{ $contact['category_name'] }}</td></tr>
        <tr><th>お問い合わせ内容</th><td>{!! nl2br(e($contact['content'])) !!}</td></tr>
      </table>

      @foreach ($contact as $key => $value)
        <input type="hidden" name="{{ $key }}" value="{{ $value }}">
      @endforeach

      <div class="form__buttons">
        <button type="submit" class="form__button-submit">送信</button>
    </form>

    <form method="post" action="/contacts/back" class="form__back">
      @csrf
      @foreach ($contact as $key => $value)
        <input type="hidden" name="{{ $key }}" value="{{ $value }}">
      @endforeach
        <button type="submit" class="form__button-submit">修正</button>
      </div>
    </form>
  </div>
@endsection
