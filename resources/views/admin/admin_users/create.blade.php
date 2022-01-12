@extends('layout.admin')

@section('title',  isset($user) ? "Редактировать пользователя ID {$user->id}" : 'Добавить пользователя')

@section('content')
    <div class="container mx-auto px-6 py-8">
        <h3 class="text-gray-700 text-3xl font-medium">{{ isset($user) ? "Редактировать пользователя ID {$user->id}" : 'Добавить пользователя' }}</h3>

        <div class="mt-8">

        </div>

        <div class="mt-8">
            <form enctype="multipart/form-data" class="space-y-5 mt-5" method="POST" action="{{ isset($user) ? route("admin.admin_users.update", $user->id) : route("admin.admin_users.store") }}">
                @csrf

                @if(isset($user))
                    <input type="hidden" name="id" value="{{ $user->id }}"/>

                    @method('PUT')
                @endif

                <input name="email" type="text" class="w-full h-12 border border-gray-800 rounded px-3 @error('email') border-red-500 @enderror" placeholder="E-mail" value="{{ $user->email ?? '' }}" />

                @error('email')
                    <p class="text-red-500">{{ $message }}</p>
                @enderror

                <input name="name" type="text" class="w-full h-12 border border-gray-800 rounded px-3 @error('name') border-red-500 @enderror" placeholder="Имя" value="{{ $user->name ?? '' }}" />

                @error('name')
                    <p class="text-red-500">{{ $message }}</p>
                @enderror

                <input name="password" type="password" autocomplete="new-password" class="w-full h-12 border border-gray-800 rounded px-3 @error('password') border-red-500 @enderror" placeholder="Пароль" value="" />
                <input name="password_confirmation" type="password" autocomplete="new-password"  class="w-full h-12 border border-gray-800 rounded px-3 @error('password') border-red-500 @enderror" placeholder="Подтверждение пароля" value="" />

                @error('password')
                    <p class="text-red-500">{{ $message }}</p>
                @enderror

                <button type="submit" class="text-center w-full bg-blue-900 rounded-md text-white py-3 font-medium">Сохранить</button>
            </form>
        </div>
    </div>
@endsection
