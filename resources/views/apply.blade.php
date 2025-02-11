<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight"><i class="fas fa-calendar-alt mr-2"></i>
            {{ __('Apply Assessment Schedule') }}
        </h2>
    </x-slot>


<div class="py-12">
    <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
        <div class="blue-800 overflow-hidden shadow-sm sm:rounded-lg">
            <div class="py-12 flex items-center justify-center min-h-screen">
                <div class="w-1/2 sm:px-6 lg:px-8">
                    <div class="bg-blue-500 overflow-hidden shadow-sm sm:rounded-lg">
                        <div class="p-8 text-gray-900 dark:text-gray-100">
                        @include('qualification.one')
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
</x-app-layout>
