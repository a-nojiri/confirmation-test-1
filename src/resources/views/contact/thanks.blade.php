@extends('layouts.app')

@section('css')
<link rel="stylesheet" href="{{ asset('css/thanks.css') }}">
@endsection

@section('content')
  <div class="thanks__content">
    <p class="thanks__message">お問い合わせありがとうございました</p>
    <div class="thanks__button">
      <a href="/" class="thanks__button-home">HOME</a>
    </div>
  </div>
@endsection
