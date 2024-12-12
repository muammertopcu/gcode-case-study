<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('messages.create_customer') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <form method="POST" action="{{ route('customers.store') }}">
                    @csrf

                    <div class="p-6 text-gray-900">
                        <div class="mb-3">
                            <x-input-label for="code" :value="__('messages.customer_code')"/>
                            <x-text-input
                                id="code"
                                class="block mt-1 w-full"
                                type="text"
                                name="code"
                                :value="old('code')"
                                required
                                autofocus
                            />
                            <x-input-error :messages="$errors->get('code')" class="mt-2"/>
                        </div>

                        <div class="mb-3">
                            <x-input-label for="name" :value="__('messages.customer_name')"/>
                            <x-text-input id="name" class="block mt-1 w-full" type="text" name="name"
                                          :value="old('name')" required/>
                            <x-input-error :messages=" $errors->get('name')" class="mt-2"/>
                        </div>

                        <div class="mb-3">
                            <x-input-label for="address" :value="__('messages.address')"/>
                            <x-text-input id="address" class="block mt-1 w-full" type="text" name="address"
                                          :value="old('address')" required/>
                            <x-input-error :messages="$errors->get('address')" class="mt-2"/>
                        </div>

                        <div class="mb-3">
                            <x-input-label for="phone" :value="__('messages.phone')"/>
                            <x-text-input id="phone" class="block mt-1 w-full" type="text" name="phone"
                                          :value="old('phone')" required/>
                            <x-input-error :messages="$errors->get('phone')" class="mt-2"/>
                        </div>

                        <div class="mb-3">
                            <x-input-label for="email" :value="__('messages.email')"/>
                            <x-text-input id="email" class="block mt-1 w-full" type="email" name="email"
                                          :value="old('email')" required/>
                            <x-input-error :messages="$errors->get('email')" class="mt-2"/>
                        </div>
                    </div>

                    <div class="p-6 text-gray-900">
                        <x-primary-button>
                            {{ __('messages.create') }}
                        </x-primary-button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</x-app-layout>
