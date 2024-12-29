<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('プロフィール編集') }}
        </h2>
    </x-slot>

    <form method="POST" action="{{ route('profile.update') }}" enctype="multipart/form-data">
        @csrf
        @method('PATCH')

        <div class="p-6 bg-gray-100 rounded-lg shadow-sm">
            <label for="name" class="block">名前:</label>
            <input id="name" name="name" type="text" value="{{ old('name', $user->name) }}" class="border-gray-300 rounded-lg w-full">

            <label for="role" class="block mt-4">役職:</label>
            <input id="role" name="role" type="text" value="{{ old('role', $user->role) }}" class="border-gray-300 rounded-lg w-full">

            <label for="profile_image" class="block mt-4">プロフィール画像:</label>
            <input id="profile_image" name="profile_image" type="file" class="border-gray-300 rounded-lg w-full">

            <button type="submit" class="mt-6 bg-blue-500 text-white py-2 px-4 rounded-lg">保存</button>
        </div>
    </form>
</x-app-layout>
