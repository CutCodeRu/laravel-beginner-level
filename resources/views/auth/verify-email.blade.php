@extends('layout.app')

@section('title', 'Подтвердите e-mail')

@section('content')
    @include('partials.header')

    <p>Необходимо подтверждение e-mail</p>

    <a href="{{ route('verification.send') }}">
        Отправить повторно
    </a>
@endsection

