@extends('layout.app')

@section('title', 'Контакты')

@section('content')
    @include('partials.header')

    <div class="h-screen bg-white flex flex-col space-y-10 justify-center items-center">
        <div class="bg-white w-96 shadow-xl rounded p-5">
            <h1 class="text-3xl font-medium">Свяжитесь с нами</h1>

            <form class="space-y-5 mt-5" method="POST" action="{{ route("contact_form_process") }}">
                @csrf

                <input name="email" type="text" class="w-full h-12 border border-gray-800 rounded px-3 @error('email') border-red-500 @enderror" placeholder="Email" />

                @error('email')
                    <p class="text-red-500">{{ $message }}</p>
                @enderror

                <input name="text" type="text" class="w-full h-12 border border-gray-800 rounded px-3 @error('text') border-red-500 @enderror" placeholder="Сообщение" />

                @error('text')
                    <p class="text-red-500">{{ $message }}</p>
                @enderror

                <button type="submit" class="text-center w-full bg-blue-900 rounded-md text-white py-3 font-medium">Написать</button>
            </form>
        </div>
    </div>
@endsection
