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
                        <div class="p-8 text-gray-900 dark:text-gray-100 text-center">

                            @php
    $currentDay = \Carbon\Carbon::now()->format('l'); // Get current day (e.g., Monday)
    $currentTime = \Carbon\Carbon::now()->format('H:i'); // Get current time in 24-hour format
    $isAvailable = ($currentDay === 'Tuesday' && $currentTime >= '00:00' && $currentTime <= '12:00');
@endphp


                            {{-- Qualification Selection Buttons --}}
                           @if($isAvailable)

                           <h2 class="text-xl font-bold mb-4">
                                Before we start, please select your qualification:

                                Note if you are not sure which qualification to select, you can directly apply for an assessment schedule.
                            </h2>

    <div class="flex justify-center space-x-4">
        <a href="{{ route('qualification.one') }}" class="bg-blue-700 hover:bg-blue-900 text-white font-bold py-2 px-4 rounded">1</a>
        <a href="{{ route('qualification.two') }}" class="bg-blue-700 hover:bg-blue-900 text-white font-bold py-2 px-4 rounded">2</a>
        <a href="{{ route('qualification.three') }}" class="bg-blue-700 hover:bg-blue-900 text-white font-bold py-2 px-4 rounded">3</a>
        <a href="{{ route('qualification.four') }}" class="bg-blue-700 hover:bg-blue-900 text-white font-bold py-2 px-4 rounded">4</a>
    </div>
    
    @else
    <h2 class="text-xl font-bold mb-4">
        You can only apply for an assessment schedule on Monday from 12:00 AM to 12:00 PM.
    </h2>

@endif



                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>


</x-app-layout>
