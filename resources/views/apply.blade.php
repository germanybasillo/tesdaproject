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
                            <h2 class="text-xl font-bold mb-4">
                                Before we start, please select your qualification:
                            </h2>
                            
                            <div class="flex justify-center space-x-4">
                                <button class="bg-blue-700 hover:bg-blue-900 text-white font-bold py-2 px-4 rounded" onclick="showQualification(1)">1</button>
                                <button class="bg-blue-700 hover:bg-blue-900 text-white font-bold py-2 px-4 rounded" onclick="showQualification(2)">2</button>
                                <button class="bg-blue-700 hover:bg-blue-900 text-white font-bold py-2 px-4 rounded" onclick="showQualification(3)">3</button>
                                <button class="bg-blue-700 hover:bg-blue-900 text-white font-bold py-2 px-4 rounded" onclick="showQualification(4)">4</button>
                            </div>

                            <p id="selectedQualification" class="mt-4 text-lg font-semibold"></p>

                            {{-- Qualification Sections (Initially Hidden) --}}
                            <div id="qualification1" class="hidden mt-6">
                                @include('qualification.one')
                            </div>

                            <div id="qualification2" class="hidden mt-6">
                                @include('qualification.two')
                            </div>

                            <div id="qualification3" class="hidden mt-6">
                                @include('qualification.three')
                            </div>

                            <div id="qualification4" class="hidden mt-6">
                                @include('qualification.four')
                            </div>

                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

<script>
    function showQualification(number) {
        // Update the selected qualification text
        document.getElementById("selectedQualification").innerText = "You selected Qualification " + number + ".";

        // Hide all qualification sections
        for (let i = 1; i <= 4; i++) {
            document.getElementById("qualification" + i).classList.add("hidden");
        }

        // Show the selected qualification section
        document.getElementById("qualification" + number).classList.remove("hidden");
    }
</script>


</x-app-layout>
