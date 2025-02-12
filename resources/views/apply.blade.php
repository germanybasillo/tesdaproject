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
                            <h2 class="text-xl font-bold mb-4">Before we start, please select your qualification:</h2>
                            <div class="flex justify-center space-x-4">
                                <button class="bg-blue-700 hover:bg-blue-900 text-white font-bold py-2 px-4 rounded" onclick="selectQualification(1)">1</button>
                                <button class="bg-blue-700 hover:bg-blue-900 text-white font-bold py-2 px-4 rounded" onclick="selectQualification(2)">2</button>
                                <button class="bg-blue-700 hover:bg-blue-900 text-white font-bold py-2 px-4 rounded" onclick="selectQualification(3)">3</button>
                                <button class="bg-blue-700 hover:bg-blue-900 text-white font-bold py-2 px-4 rounded" onclick="selectQualification(4)">4</button>
                            </div>

                            <p id="selectedQualification" class="mt-4 text-lg font-semibold"></p>

                            <div id="qualificationContent" class="mt-6">
                                {{-- This will dynamically load the qualification Blade file --}}
                            </div>

                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

<script>
    function selectQualification(number) {
        document.getElementById("selectedQualification").innerText = "You selected " + number + " qualification(s).";

        let qualificationContent = document.getElementById("qualificationContent");

        // Load the corresponding qualification file
        let qualificationView = '';
        if (number === 1) {
            qualificationView = @json(view('qualification.one')->render());
        } else if (number === 2) {
            qualificationView = @json(view('qualification.two')->render());
        } else if (number === 3) {
            qualificationView = @json(view('qualification.three')->render());
        } else if (number === 4) {
            qualificationView = @json(view('qualification.four')->render());
        }

        qualificationContent.innerHTML = qualificationView;
    }
</script>

</x-app-layout>
