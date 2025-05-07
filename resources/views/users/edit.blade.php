<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Edit User') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 text-gray-900">
                    <form method="POST" action="{{ route('admin.users.update', $user) }}">
                        @csrf
                        @method('PATCH')

                        <div>
                            <x-input-label for="name" :value="__('Name')" />
                            <x-text-input id="name" class="block mt-1 w-full" type="text" name="name" :value="old('name', $user->name)" required autofocus readonly />
                            <x-input-error :messages="$errors->get('name')" class="mt-2" />
                        </div>

                        <div class="mt-4">
                            <x-input-label for="email" :value="__('Email')" />
                            <x-text-input id="email" class="block mt-1 w-full" type="email" name="email" :value="old('email', $user->email)" required readonly />
                            <x-input-error :messages="$errors->get('email')" class="mt-2" />
                        </div>

                        <div class="mt-6">
                            <x-input-label :value="__('Roles')" />

                            <div class="grid grid-cols-2 md:grid-cols-3 gap-4 mt-2">
                                @foreach($roles as $role)
                                    <div class="flex items-center">
                                        <input id="role-{{ $role->id }}" type="checkbox" name="roles[]" value="{{ $role->name }}"
                                               class="rounded border-gray-300 text-indigo-600 shadow-sm focus:ring-indigo-500"
                                               {{ $user->hasRole($role->name) ? 'checked' : '' }}>
                                        <label for="role-{{ $role->id }}" class="ml-2 text-sm text-gray-600">{{ $role->name }}</label>
                                    </div>
                                @endforeach
                            </div>
                             <x-input-error :messages="$errors->get('roles')" class="mt-2" />
                        </div>

                        <div class="flex items-center justify-end mt-4">
                            <x-primary-button>
                                {{ __('Update User') }}
                            </x-primary-button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>