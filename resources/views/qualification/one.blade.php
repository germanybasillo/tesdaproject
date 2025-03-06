<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight"><i class="fas fa-calendar-alt mr-2"></i>
            {{ __('Apply Assessment Schedule') }}
        </h2>
    </x-slot>
    
    <div class="p-4">
    <!-- <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
        <div class="blue-800 overflow-hidden shadow-sm sm:rounded-lg">
            <div class="py-12 flex items-center justify-center min-h-screen"> -->
            <div class="max-w-7xl">
                <div class="w-1/2 sm:px-6 lg:px-8">
                    <div class="bg-blue-500 overflow-hidden shadow-sm sm:rounded-lg">
                        <div class="p-8 text-gray-900 dark:text-gray-100">
                            <h2 class="text-xl font-bold mb-4">
                            <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/flatpickr/dist/flatpickr.min.css">
                            <style>
                                .holiday {
                                    background-color: red !important;
                                    color: white !important;
                                    border-radius: 50%;
                                    font-weight: bold;
                                }
                            </style>



              <form action="{{ route('assessments.one') }}" method="POST" class="space-y-6" enctype="multipart/form-data">
    @csrf



				<div id="step1">

                <h2 class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight">
        <i class="fas fa-calendar-alt mr-2"></i>
        {{ __('Apply Assessment Schedule') }}
    </h2><br>

   <div>
    <label for="assessment_date" class="block text-sm font-medium mb-2">
        Desired Date of Assessment:    </label>
    <input class="w-full px-4 py-2 border rounded-lg focus:ring focus:ring-blue-300 bg-white dark:border-gray-600 dark:text-black"
        type="date" 
        id="assessment_date" 
        name="assessment_date"
        placeholder="Select Date"
        required 
    >
</div>


                                                          <div>
                                    <label for="qualification" class="block text-sm font-medium mb-2">
                                        Qualification:
                                    </label>
                                    <select id="qualification" name="qualification"
					    class="w-full px-4 py-2 border rounded-lg focus:ring focus:ring-blue-300 bg-white dark:border-white-600 dark:text-black">
                                        <option value="" disabled selected>Select your qualification</option>
                                        <option value="FBS NC II">FBS NC II</option>
                                        <option value="CSS NC II">CSS NC II</option>
					<option value="Cook NC II">Cook NC II</option>
                                        <option value="Driving NC II">Driving NC II</option>
                                    </select>
                                </div>

                                <div>
                                    <label for="no_of_pax" class="block text-sm font-medium mb-2">
                                        Number of Pax:
                                    </label>
                                    <select id="no_of_pax" name="no_of_pax"
					    class="w-full px-4 py-2 border rounded-lg focus:ring focus:ring-blue-300 bg-white dark:border-gray-600 dark:text-black">
                                        <option value="" disabled selected>Select your number of pax</option>
                                        @for ($i = 1; $i <= 10; $i++)
                                            <option value="{{ $i }}">{{ $i }}</option>
                                        @endfor
                                    </select>
                                </div>

                                <div>
    <label for="training_status" class="block text-sm font-medium mb-2">
        Training Status:
    </label>
    <select id="training_status" name="training_status"
        class="w-full px-4 py-2 border rounded-lg focus:ring focus:ring-blue-300 bg-white dark:border-gray-600 dark:text-black">
        <option value="" disabled selected>Select your training status</option>
        <option value="scholar">Scholar</option>
        <option value="non-scholar">Non-Scholar</option>
        <option value="mix">Mix</option>
    </select>
</div>

<script>
    document.getElementById('training_status').addEventListener('change', function () {
        var scholarshipDiv = document.getElementById('scholarship_div');
        var nonScholarshipDiv = document.getElementById('non_scholarship_div');
        var orInputContainer = document.getElementById('orInputContainer');
        var mix_no_container = document.getElementById('mix_no_container');

        if (this.value === 'scholar') {
            scholarshipDiv.style.display = 'block';
            nonScholarshipDiv.style.display = 'none';
            orInputContainer.style.display = 'none';
        } else if (this.value === 'non-scholar') {
            scholarshipDiv.style.display = 'none';
            nonScholarshipDiv.style.display = 'block';
            orInputContainer.style.display = 'block';
        } else if (this.value === 'mix') {
            scholarshipDiv.style.display = 'block';
            nonScholarshipDiv.style.display = 'block';
            orInputContainer.style.display = 'block';
            mix_no_container.style.display = 'block';
        }
    });
</script>

<script>
    document.getElementById('no_of_pax').addEventListener('change', function() {
        let selectedValue = parseInt(this.value);
        let mixNoSelect = document.getElementById('mix_no');

        // Clear existing options except the first one
        mixNoSelect.innerHTML = '<option value="" disabled selected>Select your number of Scholar</option>';

        // Populate mix_no dropdown only if selectedValue is greater than 1
        if (selectedValue > 1) {
            for (let i = selectedValue - 1; i >= 1; i--) {
                let option = document.createElement('option');
                option.value = i;
                option.textContent = i;
                mixNoSelect.appendChild(option);
            }
        }
    });
</script>


<div id="mix_no_container" style="display: none;">
    <label for="mix_no" class="block text-sm font-medium mb-2">
        Number of Scholar:
    </label>
    <select id="mix_no" name="mix_no" 
            class="w-full px-4 py-2 border rounded-lg focus:ring focus:ring-blue-300 bg-white dark:border-gray-600 dark:text-black">
        <option value="" disabled selected>Select your number of Scholar</option>
    </select>
</div>



<!-- Scholar Section -->
<div id="scholarship_div" style="display: none;">
    <label for="scholarship" class="block text-sm font-medium mb-2">
        Scholarship Type:
    </label>
    <select id="scholarship" name="type_of_scholar" 
        class="w-full px-4 py-2 border rounded-lg focus:ring focus:ring-blue-300 bg-white dark:border-gray-600 dark:text-black">
        <option value="" disabled selected>Select your scholarship type</option>
        <option value="ttsp">TTSP</option>
        <option value="cfsp">CFSP</option>
        <option value="uaqtea">UAQTEA</option>
        <option value="twsp">TWSP</option>
    </select>
</div>

<!-- Non-Scholar Section -->
<div id="non_scholarship_div" style="display: none;">
    <label for="non_scholarship" class="block text-sm font-medium mb-2">
        Non-Scholarship Type:
    </label>
    <select id="non_scholarship" name="type_of_non_scholar" 
        class="w-full px-4 py-2 border rounded-lg focus:ring focus:ring-blue-300 bg-white dark:border-gray-600 dark:text-black">
        <option value="" disabled selected>Select your non-scholarship type</option>
        <option value="Walk-In">Walk-In</option>
        <option value="CAWS">CAWS</option>
        <option value="Three">Three</option>
        <option value="Four">Four</option>
    </select>
</div>


               

              <!-- Hidden Qualification Fields -->
    <div id="qualificationSection2" style="display: none;">
        <div>
            <label for="qualification2" class="block text-sm font-medium mb-2">
                Qualification:
            </label>
            <select id="qualification2" name="qualification2" 
                    class="w-full px-4 py-2 border rounded-lg focus:ring focus:ring-blue-300 bg-white dark:border-white-600 dark:text-black">
                <option value="" disabled selected>Select your qualification</option>
                <option value="FBS NC II">FBS NC II</option>
                <option value="CSS NC II">CSS NC II</option>
                <option value="Cook NC II">Cook NC II</option>
                <option value="Driving NC II">Driving NC II</option>
            </select>
        </div>

        <div>
            <label for="no_of_pax2" class="block text-sm font-medium mb-2">
                Number of Pax:
            </label>
            <select id="no_of_pax2" name="no_of_pax2" 
                    class="w-full px-4 py-2 border rounded-lg focus:ring focus:ring-blue-300 bg-white dark:border-gray-600 dark:text-black">
                <option value="" disabled selected>Select your number of pax</option>
                @for ($i = 1; $i <= 10; $i++)
                    <option value="{{ $i }}">{{ $i }}</option>
                @endfor
            </select>
        </div>

        <div>
            <label for="training_status2" class="block text-sm font-medium mb-2">
                Training Status:
            </label>
            <select id="training_status2" name="training_status2" 
                    class="w-full px-4 py-2 border rounded-lg focus:ring focus:ring-blue-300 bg-white dark:border-gray-600 dark:text-black">
                <option value="" disabled selected>Select your training status</option>
                <option value="scholar">Scholar</option>
                <option value="non-scholar">Non-Scholar</option>
                <option value="mix">Mix</option>
            </select>
        </div>
        
        <!-- Scholarship and Non-Scholarship Fields -->
        <script>
    document.getElementById('training_status2').addEventListener('change', function () {
        var scholarshipDiv2 = document.getElementById('scholarship_div2');
        var non_scholarshipDiv2 = document.getElementById('non_scholarship_div2');
        var orInputContainer2 = document.getElementById('orInputContainer2');
        var mix_no_container2 = document.getElementById('mix_no_container2');

        if (this.value === 'scholar') {
            scholarshipDiv2.style.display = 'block';
            non_scholarshipDiv2.style.display = 'none';
            orInputContainer2.style.display = 'none';
        } else if (this.value === 'non-scholar') {
            scholarshipDiv2.style.display = 'none';
            non_scholarshipDiv2.style.display = 'block';
            orInputContainer2.style.display = 'block';
        } else if (this.value === 'mix') {
            scholarshipDiv2.style.display = 'block';
            non_scholarshipDiv2.style.display = 'block';
            orInputContainer2.style.display = 'block';
            mix_no_container2.style.display = 'block';
        }
    });
</script>

<script>
    document.getElementById('no_of_pax2').addEventListener('change', function() {
        let selectedValue = parseInt(this.value);
        let mixNoSelect = document.getElementById('mix_no2');

        // Clear existing options except the first one
        mixNoSelect.innerHTML = '<option value="" disabled selected>Select your number of Scholar</option>';

        // Populate mix_no dropdown only if selectedValue is greater than 1
        if (selectedValue > 1) {
            for (let i = selectedValue - 1; i >= 1; i--) {
                let option = document.createElement('option');
                option.value = i;
                option.textContent = i;
                mixNoSelect.appendChild(option);
            }
        }
    });
</script>


<div id="mix_no_container2" style="display: none;">
    <label for="mix_no2" class="block text-sm font-medium mb-2">
        Number of Scholar:
    </label>
    <select id="mix_no2" name="mix_no2" 
            class="w-full px-4 py-2 border rounded-lg focus:ring focus:ring-blue-300 bg-white dark:border-gray-600 dark:text-black">
        <option value="" disabled selected>Select your number of Scholar</option>
    </select>
</div>





        <div id="scholarship_div2" style="display: none;">
            <label for="scholarship2" class="block text-sm font-medium mb-2">
                Scholarship Type:
            </label>
            <select id="scholarship2" name="type_of_scholar2" 
                    class="w-full px-4 py-2 border rounded-lg focus:ring focus:ring-blue-300 bg-white dark:border-gray-600 dark:text-black">
                <option value="" disabled selected>Select your scholarship type</option>
                <option value="ttsp">TTSP</option>
                <option value="cfsp">CFSP</option>
                <option value="uaqtea">UAQTEA</option>
                <option value="twsp">TWSP</option>
            </select>
        </div>

        <div id="non_scholarship_div2" style="display: none;">
            <label for="non_scholarship2" class="block text-sm font-medium mb-2">
                Non Scholarship Type:
            </label>
            <select id="non_scholarship2" name="type_of_non_scholar2" 
                    class="w-full px-4 py-2 border rounded-lg focus:ring focus:ring-blue-300 bg-white dark:border-gray-600 dark:text-black">
                <option value="" disabled selected>Select your non scholarship type</option>
                <option value="Walk-In">Walk-In</option>
                <option value="CAWS">CAWS</option>
                <option value="Three">Three</option>
                <option value="Four">Four</option>
            </select>
        </div>
    </div>

              <!-- Hidden Qualification Fields -->
    <div id="qualificationSection3" style="display: none;">
        <div>
            <label for="qualification3" class="block text-sm font-medium mb-2">
                Qualification:
            </label>
            <select id="qualification3" name="qualification3" 
                    class="w-full px-4 py-2 border rounded-lg focus:ring focus:ring-blue-300 bg-white dark:border-white-600 dark:text-black">
                <option value="" disabled selected>Select your qualification</option>
                <option value="FBS NC II">FBS NC II</option>
                <option value="CSS NC II">CSS NC II</option>
                <option value="Cook NC II">Cook NC II</option>
                <option value="Driving NC II">Driving NC II</option>
            </select>
        </div>

        <div>
            <label for="no_of_pax3" class="block text-sm font-medium mb-2">
                Number of Pax:
            </label>
            <select id="no_of_pax3" name="no_of_pax3" 
                    class="w-full px-4 py-2 border rounded-lg focus:ring focus:ring-blue-300 bg-white dark:border-gray-600 dark:text-black">
                <option value="" disabled selected>Select your number of pax</option>
                @for ($i = 1; $i <= 10; $i++)
                    <option value="{{ $i }}">{{ $i }}</option>
                @endfor
            </select>
        </div>

        <div>
            <label for="training_status3" class="block text-sm font-medium mb-2">
                Training Status:
            </label>
            <select id="training_status3" name="training_status3" 
                    class="w-full px-4 py-2 border rounded-lg focus:ring focus:ring-blue-300 bg-white dark:border-gray-600 dark:text-black">
                <option value="" disabled selected>Select your training status</option>
                <option value="scholar">Scholar</option>
                <option value="non-scholar">Non-Scholar</option>
                <option value="mix">Mix</option>
            </select>
        </div>
        
        <script>
    document.getElementById('training_status3').addEventListener('change', function () {
        var scholarshipDiv3 = document.getElementById('scholarship_div3');
        var non_scholarshipDiv3 = document.getElementById('non_scholarship_div3');
        var orInputContainer3 = document.getElementById('orInputContainer3');

        if (this.value === 'scholar') {
            scholarshipDiv3.style.display = 'block';
            non_scholarshipDiv3.style.display = 'none';
            orInputContainer3.style.display = 'none';
        } else if (this.value === 'non-scholar') {
            scholarshipDiv3.style.display = 'none';
            non_scholarshipDiv3.style.display = 'block';
            orInputContainer3.style.display = 'block';
        } else if (this.value === 'mix') {
            scholarshipDiv3.style.display = 'block';
            non_scholarshipDiv3.style.display = 'block';
            orInputContainer3.style.display = 'block';
        }
    });
</script>



        <div id="scholarship_div3" style="display: none;">
            <label for="scholarship3" class="block text-sm font-medium mb-2">
                Scholarship Type:
            </label>
            <select id="scholarship3" name="type_of_scholar3" 
                    class="w-full px-4 py-2 border rounded-lg focus:ring focus:ring-blue-300 bg-white dark:border-gray-600 dark:text-black">
                <option value="" disabled selected>Select your scholarship type</option>
                <option value="ttsp">TTSP</option>
                <option value="cfsp">CFSP</option>
                <option value="uaqtea">UAQTEA</option>
                <option value="twsp">TWSP</option>
            </select>
        </div>

        <div id="non_scholarship_div3" style="display: none;">
            <label for="non_scholarship3" class="block text-sm font-medium mb-2">
                Non Scholarship Type:
            </label>
            <select id="non_scholarship3" name="type_of_non_scholar3" 
                    class="w-full px-4 py-2 border rounded-lg focus:ring focus:ring-blue-300 bg-white dark:border-gray-600 dark:text-black">
                <option value="" disabled selected>Select your non scholarship type</option>
                <option value="Walk-In">Walk-In</option>
                <option value="CAWS">CAWS</option>
                <option value="Three">Three</option>
                <option value="Four">Four</option>
            </select>
        </div>
    </div>

                  <!-- Hidden Qualification Fields -->
                  <div id="qualificationSection4" style="display: none;">
        <div>
            <label for="qualification4" class="block text-sm font-medium mb-2">
                Qualification:
            </label>
            <select id="qualification4" name="qualification4" 
                    class="w-full px-4 py-2 border rounded-lg focus:ring focus:ring-blue-300 bg-white dark:border-white-600 dark:text-black">
                <option value="" disabled selected>Select your qualification</option>
                <option value="FBS NC II">FBS NC II</option>
                <option value="CSS NC II">CSS NC II</option>
                <option value="Cook NC II">Cook NC II</option>
                <option value="Driving NC II">Driving NC II</option>
            </select>
        </div>

        <div>
            <label for="no_of_pax4" class="block text-sm font-medium mb-2">
                Number of Pax:
            </label>
            <select id="no_of_pax4" name="no_of_pax4" 
                    class="w-full px-4 py-2 border rounded-lg focus:ring focus:ring-blue-300 bg-white dark:border-gray-600 dark:text-black">
                <option value="" disabled selected>Select your number of pax</option>
                @for ($i = 1; $i <= 10; $i++)
                    <option value="{{ $i }}">{{ $i }}</option>
                @endfor
            </select>
        </div>

        <div>
            <label for="training_status4" class="block text-sm font-medium mb-2">
                Training Status:
            </label>
            <select id="training_status4" name="training_status4" 
                    class="w-full px-4 py-2 border rounded-lg focus:ring focus:ring-blue-300 bg-white dark:border-gray-600 dark:text-black">
                <option value="" disabled selected>Select your training status</option>
                <option value="scholar">Scholar</option>
                <option value="non-scholar">Non-Scholar</option>
                <option value="mix">Mix</option>

            </select>
        </div>
        
        <script>
    document.getElementById('training_status4').addEventListener('change', function () {
        var scholarshipDiv4 = document.getElementById('scholarship_div4');
        var non_scholarshipDiv4 = document.getElementById('non_scholarship_div4');
        var orInputContainer4 = document.getElementById('orInputContainer4');

        if (this.value === 'scholar') {
            scholarshipDiv4.style.display = 'block';
            non_scholarshipDiv4.style.display = 'none';
            orInputContainer4.style.display = 'none';
        } else if (this.value === 'non-scholar') {
            scholarshipDiv4.style.display = 'none';
            non_scholarshipDiv4.style.display = 'block';
            orInputContainer4.style.display = 'block';
        } else if (this.value === 'mix') {
            scholarshipDiv4.style.display = 'block';
            non_scholarshipDiv4.style.display = 'block';
            orInputContainer4.style.display = 'block';
        }
    });
</script>

        <div id="scholarship_div4" style="display: none;">
            <label for="scholarship4" class="block text-sm font-medium mb-2">
                Scholarship Type:
            </label>
            <select id="non_scholarship4" name="type_of_scholar4" 
                    class="w-full px-4 py-2 border rounded-lg focus:ring focus:ring-blue-300 bg-white dark:border-gray-600 dark:text-black">
                <option value="" disabled selected>Select your scholarship type</option>
                <option value="ttsp">TTSP</option>
                <option value="cfsp">CFSP</option>
                <option value="uaqtea">UAQTEA</option>
                <option value="twsp">TWSP</option>
            </select>
        </div>

        <div id="non_scholarship_div4" style="display: none;">
            <label for="non_scholarship4" class="block text-sm font-medium mb-2">
                Non Scholarship Type:
            </label>
            <select id="non_scholarship4" name="type_of_non_scholar4" 
                    class="w-full px-4 py-2 border rounded-lg focus:ring focus:ring-blue-300 bg-white dark:border-gray-600 dark:text-black">
                <option value="" disabled selected>Select your non scholarship type</option>
                <option value="Walk-In">Walk-In</option>
                <option value="CAWS">CAWS</option>
                <option value="Three">Three</option>
                <option value="Four">Four</option>
            </select>
        </div>
    </div>

<!-- Single Add Qualification Button -->
<button type="button" id="addQualificationButton"  
            class="mt-4 px-4 py-2 bg-green-500 text-white rounded-lg hover:bg-green-400">
        Add Qualification
</button>

<!-- Back Button (Hidden by Default) -->
<button type="button" id="backButton"  
        class="mt-4 px-4 py-2 bg-red-500 text-white rounded-lg hover:bg-red-400" 
        style="display: none;">
    Back
</button>

<script>
    let currentSection = 1; // Tracks the current section number

    // Add Qualification Button Click
    document.getElementById('addQualificationButton').addEventListener('click', function() {
        if (currentSection === 1) {
            document.getElementById('qualificationSection2').style.display = 'block';
            document.getElementById('backButton').style.display = 'inline-block'; // Show Back button
            currentSection = 2;
        } else if (currentSection === 2) {
            document.getElementById('qualificationSection3').style.display = 'block';
            currentSection = 3;
        } else if (currentSection === 3) {
            document.getElementById('qualificationSection4').style.display = 'block';
            currentSection = 4;
        } else {
            // Show SweetAlert2 popup when max is reached
            Swal.fire({
                icon: 'error',
                title: 'Limit Reached',
                text: 'Maximum of 4 qualifications only!',
                confirmButtonColor: '#d33'
            });
        }
    });

    // Back Button Click
    document.getElementById('backButton').addEventListener('click', function() {
        if (currentSection === 2) {
            document.getElementById('qualificationSection2').style.display = 'none';
            document.getElementById('backButton').style.display = 'none'; // Hide Back button when no sections are left
            currentSection = 1;
        } else if (currentSection === 3) {
            document.getElementById('qualificationSection3').style.display = 'none';
            currentSection = 2;
        } else if (currentSection === 4) {
            document.getElementById('qualificationSection4').style.display = 'none';
            currentSection = 3;
        }
    });
</script>

<div>
    <label for="agreement" class="flex items-center space-x-2">
        <input type="checkbox" id="agreement" class="rounded border-gray-300 text-blue-600 focus:ring-blue-500" />
        <span>I agree to the terms and conditions.</span>
    </label>
</div>

<script>
    document.getElementById('agreement').addEventListener('change', function () {
        const nextButton = document.getElementById('next_button');
        nextButton.disabled = !this.checked; // Enable if checked, disable otherwise
    });
</script>
    
<button type="button" id="next_button" 
        class="mt-4 px-4 py-2 bg-blue-900 text-white rounded-lg hover:bg-blue-600 disabled:opacity-50" 
        disabled>
    Apply Schedule
</button>

   <!-- Cancel Button to go back -->
   <button type="button" id="cancel_button" 
            class="mt-4 px-4 py-2 bg-gray-300 text-black rounded-lg hover:bg-gray-400"
            onclick="window.history.back();">
            Cancel
        </button>

            </div>
 <!-- Step 2: Document Upload -->
    <div id="step2" style="display: none;">
        
    <!-- Document Title -->
    <div id="qualificationTitle" class="mt-4">
            <h2>Please upload your document here (PDF)</h2>
        </div>

        <script>
    // Handle qualification selection and dynamically update Step 2 title
    document.getElementById('qualification').addEventListener('change', function() {
        const qualification = this.value;
        const titleElement = document.getElementById('qualificationTitle');

        // Update title based on selected qualification
        if (qualification) {
            titleElement.innerHTML = `<h3>Provide PDF for ${qualification}</h3>`;
        }
    });
</script>

<!-- Endorsement Letter To TESDA -->
<div class="mt-4">
    <x-input-label class="text-white" for="elttDocument" :value="__('Endorsement Letter To TESDA')" />
    <x-text-input id="elttDocument" class="block mt-1 w-full bg-white dark:text-black" type="file" name="eltt" placeholder="Please upload your document here (PDF)" value="{{ old('eltt') }}" autocomplete="eltt" onchange="previewDocument(event, 'elttPreviewContainer', 'elttPreview')" required/>
    <x-input-error :messages="$errors->get('eltt')" class="mt-2" />

    <!-- Document Preview -->
    <div id="elttPreviewContainer" style="display:none; margin-top: 20px; text-align: center; position: absolute; top: 73px; left:33%;">
    <iframe id="elttPreview" src="#" style="width: 80vh; height: 80vh; border: 1px solid #ccc;"></iframe>
    <!-- <h3 style="color:blue;">Preview Endorsement Letter</h3> -->
</div>
</div>


<!-- Request Form For Test Package -->
<div class="mt-4">
    <x-input-label class="text-white" for="rfftpDocument" :value="__('Request Form For Test Package')" />
    <x-text-input id="rfftpDocument" class="block mt-1 w-full bg-white dark:text-black" type="file" name="rfftp" placeholder="Please upload your document here (PDF)" value="{{ old('rfftp') }}" autocomplete="rfftp" onchange="previewDocument(event, 'rfftpPreviewContainer', 'rfftpPreview')" required/>
    <x-input-error :messages="$errors->get('rfftp')" class="mt-2" />

    <!-- Document Preview -->
    <div id="rfftpPreviewContainer" style="display:none; margin-top: 20px; text-align: center; position: absolute; top: 73px; left:33%;">
        <iframe id="rfftpPreview" src="#" style="width: 80vh; height: 80vh; border: 1px solid #ccc;"></iframe>
        <!-- <h3 style="color:blue;">Preview Request Form</h3> -->
    </div>

</div>

<!-- Official Receipt of Payment for Assessment for Non-Scholar -->
<div class="mt-4" class="text-white" style="display: none;" id="orInputContainer">
    <x-input-label for="oropfafnsDocument" :value="__('Official Receipt of Payment for Assessment for Non-Scholar')" />
    <x-text-input id="oropfafnsDocument" class="block mt-1 w-full bg-white dark:text-black" type="file" name="oropfafns" placeholder="Please upload your document here (PDF)" value="{{ old('oropfafns') }}" autocomplete="oropfafns" onchange="previewDocument(event, 'oropfafnsPreviewContainer', 'oropfafnsPreview')"/>
    <x-input-error :messages="$errors->get('oropfafns')" class="mt-2" />

    <!-- Document Preview -->
    <div id="oropfafnsPreviewContainer"  style="display:none; margin-top: 20px; text-align: center; position: absolute; top: 73px;  left:33%;">
        <iframe id="oropfafnsPreview" src="#"  style="width: 80vh; height: 80vh; border: 1px solid #ccc;"></iframe>
        <!-- <h3 style="color:blue;">Preview Official Receipt</h3> -->
    </div>
</div>


<!-- Submission of Previous CCTV Recordings -->
<div class="mt-4">
    <x-input-label class="text-white" for="sopcctvrDocument" :value="__('Submission of Previous CCTV Recordings')" />
    <x-text-input id="sopcctvrDocument" class="block mt-1 w-full bg-white dark:text-black" type="file" name="sopcctvr" placeholder="Please upload your document here (PDF)" value="{{ old('sopcctvr') }}" autocomplete="sopcctvr" onchange="previewDocument(event, 'sopcctvrPreviewContainer', 'sopcctvrPreview')" required/>
    <x-input-error :messages="$errors->get('oropfafns')" class="mt-2" />

    <!-- Document Preview -->
    <div id="sopcctvrPreviewContainer"  style="display:none; margin-top: 20px; text-align: center; position: absolute; top: 73px;  left:33%;">
        <iframe id="sopcctvrPreview" src="#" style="width: 80vh; height: 80vh; border: 1px solid #ccc;"></iframe>
        <!-- <h3 style="color:blue;">Preview CCTV Recordings</h3> -->
    </div>
</div>


<div id="next2" style="display: none;">

   <!-- Document Title -->
   <div id="qualificationTitle2" class="mt-4">
            <h2>Please upload your document here (PDF)</h2>
        </div>

        <script>
    // Handle qualification selection and dynamically update Step 2 title
    document.getElementById('qualification2').addEventListener('change', function() {
        const qualification2 = this.value;
        const titleElement = document.getElementById('qualificationTitle2');

        // Update title based on selected qualification
        if (qualification2) {
            titleElement.innerHTML = `<h3>Provide PDF for ${qualification2}</h3>`;
        }
    });
</script>

<!-- Endorsement Letter To TESDA -->
<div class="mt-4">
    <x-input-label class="text-white" for="elttDocument" :value="__('Endorsement Letter To TESDA')" />
    <x-text-input id="elttDocument2" class="block mt-1 w-full bg-white dark:text-black" type="file" name="eltt2" placeholder="Please upload your document here (PDF)" value="{{ old('eltt2') }}" autocomplete="eltt2" onchange="previewDocument(event, 'elttPreviewContainer2', 'elttPreview2')" />
    <x-input-error :messages="$errors->get('eltt2')" class="mt-2" />

    <!-- Document Preview -->
    <div id="elttPreviewContainer2" style="display:none; margin-top: 20px; text-align: center; position: absolute; top: 73px; left:33%;">
    <iframe id="elttPreview2" src="#" style="width: 80vh; height: 80vh; border: 1px solid #ccc;"></iframe>
    <!-- <h3 style="color:blue;">Preview Endorsement Letter</h3> -->
</div>
</div>


<!-- Request Form For Test Package -->
<div class="mt-4">
    <x-input-label class="text-white" for="rfftpDocument" :value="__('Request Form For Test Package')" />
    <x-text-input id="rfftpDocument2" class="block mt-1 w-full bg-white dark:text-black" type="file" name="rfftp2" placeholder="Please upload your document here (PDF)" value="{{ old('rfftp2') }}" autocomplete="rfftp2" onchange="previewDocument(event, 'rfftpPreviewContainer2', 'rfftpPreview2')" />
    <x-input-error :messages="$errors->get('rfftp2')" class="mt-2" />

    <!-- Document Preview -->
    <div id="rfftpPreviewContainer2" style="display:none; margin-top: 20px; text-align: center; position: absolute; top: 73px; left:33%;">
        <iframe id="rfftpPreview2" src="#" style="width: 80vh; height: 80vh; border: 1px solid #ccc;"></iframe>
        <!-- <h3 style="color:blue;">Preview Request Form</h3> -->
    </div>

</div>

<!-- Official Receipt of Payment for Assessment for Non-Scholar -->
<div class="mt-4" class="text-white" style="display: none;" id="orInputContainer2">
    <x-input-label for="oropfafnsDocument2" :value="__('Official Receipt of Payment for Assessment for Non-Scholar')" />
    <x-text-input id="oropfafnsDocument2" class="block mt-1 w-full bg-white dark:text-black" type="file" name="oropfafns2" placeholder="Please upload your document here (PDF)" value="{{ old('oropfafns2') }}" autocomplete="oropfafns2" onchange="previewDocument(event, 'oropfafnsPreviewContainer2', 'oropfafnsPreview2')"/>
    <x-input-error :messages="$errors->get('oropfafns2')" class="mt-2" />

    <!-- Document Preview -->
    <div id="oropfafnsPreviewContainer2"  style="display:none; margin-top: 20px; text-align: center; position: absolute; top: 73px;  left:33%;">
        <iframe id="oropfafnsPreview2" src="#" style="width: 80vh; height: 80vh; border: 1px solid #ccc;"></iframe>
        <!-- <h3 style="color:blue;">Preview Official Receipt</h3> -->
    </div>
</div>


<!-- Submission of Previous CCTV Recordings -->
<div class="mt-4">
    <x-input-label class="text-white" for="sopcctvrDocument2" :value="__('Submission of Previous CCTV Recordings')" />
    <x-text-input id="sopcctvrDocument2" class="block mt-1 w-full bg-white dark:text-black" type="file" name="sopcctvr2" placeholder="Please upload your document here (PDF)" value="{{ old('sopcctvr2') }}" autocomplete="sopcctvr2" onchange="previewDocument(event, 'sopcctvrPreviewContainer2', 'sopcctvrPreview2')" />
    <x-input-error :messages="$errors->get('oropfafns2')" class="mt-2" />

    <!-- Document Preview -->
    <div id="sopcctvrPreviewContainer2"  style="display:none; margin-top: 20px; text-align: center; position: absolute; top: 73px;  left:33%;">
        <iframe id="sopcctvrPreview2" src="#" style="width: 80vh; height: 80vh; border: 1px solid #ccc;"></iframe>
        <!-- <h3 style="color:blue;">Preview CCTV Recordings</h3> -->
    </div>
</div>

</div>


<div id="next3" style="display: none;">

   <!-- Document Title -->
   <div id="qualificationTitle3" class="mt-4">
            <h2>Please upload your document here (PDF)</h2>
        </div>

        <script>
    // Handle qualification selection and dynamically update Step 2 title
    document.getElementById('qualification3').addEventListener('change', function() {
        const qualification3 = this.value;
        const titleElement = document.getElementById('qualificationTitle3');

        // Update title based on selected qualification
        if (qualification3) {
            titleElement.innerHTML = `<h3>Provide PDF for ${qualification3}</h3>`;
        }
    });
</script>

<!-- Endorsement Letter To TESDA -->
<div class="mt-4">
    <x-input-label class="text-white" for="elttDocument" :value="__('Endorsement Letter To TESDA')" />
    <x-text-input id="elttDocument3" class="block mt-1 w-full bg-white dark:text-black" type="file" name="eltt3" placeholder="Please upload your document here (PDF)" value="{{ old('eltt3') }}" autocomplete="eltt3" onchange="previewDocument(event, 'elttPreviewContainer3', 'elttPreview3')" />
    <x-input-error :messages="$errors->get('eltt3')" class="mt-2" />

    <!-- Document Preview -->
    <div id="elttPreviewContainer3" style="display:none; margin-top: 20px; text-align: center; position: absolute; top: 73px; left:33%;">
    <iframe id="elttPreview3" src="#" style="width: 80vh; height: 80vh; border: 1px solid #ccc;"></iframe>
    <!-- <h3 style="color:blue;">Preview Endorsement Letter</h3> -->
</div>
</div>


<!-- Request Form For Test Package -->
<div class="mt-4">
    <x-input-label class="text-white" for="rfftpDocument" :value="__('Request Form For Test Package')" />
    <x-text-input id="rfftpDocument3" class="block mt-1 w-full bg-white dark:text-black" type="file" name="rfftp3" placeholder="Please upload your document here (PDF)" value="{{ old('rfftp3') }}" autocomplete="rfftp3" onchange="previewDocument(event, 'rfftpPreviewContainer3', 'rfftpPreview3')" />
    <x-input-error :messages="$errors->get('rfftp3')" class="mt-2" />

    <!-- Document Preview -->
    <div id="rfftpPreviewContainer3" style="display:none; margin-top: 20px; text-align: center; position: absolute; top: 73px; left:33%;">
        <iframe id="rfftpPreview3" src="#" style="width: 80vh; height: 80vh; border: 1px solid #ccc;"></iframe>
        <!-- <h3 style="color:blue;">Preview Request Form</h3> -->
    </div>

</div>

<!-- Official Receipt of Payment for Assessment for Non-Scholar -->
<div class="mt-4" class="text-white" style="display: none;" id="orInputContainer3">
    <x-input-label for="oropfafnsDocument3" :value="__('Official Receipt of Payment for Assessment for Non-Scholar')" />
    <x-text-input id="oropfafnsDocument3" class="block mt-1 w-full bg-white dark:text-black" type="file" name="oropfafns3" placeholder="Please upload your document here (PDF)" value="{{ old('oropfafns3') }}" autocomplete="oropfafns3" onchange="previewDocument(event, 'oropfafnsPreviewContainer3', 'oropfafnsPreview3')"/>
    <x-input-error :messages="$errors->get('oropfafns3')" class="mt-2" />

    <!-- Document Preview -->
    <div id="oropfafnsPreviewContainer3"  style="display:none; margin-top: 20px; text-align: center; position: absolute; top: 73px; left:33%;">
        <iframe id="oropfafnsPreview3" src="#" style="width: 80vh; height: 80vh; border: 1px solid #ccc;"></iframe>
        <!-- <h3 style="color:blue;">Preview Official Receipt</h3> -->
    </div>
</div>


<!-- Submission of Previous CCTV Recordings -->
<div class="mt-4">
    <x-input-label class="text-white" for="sopcctvrDocument3" :value="__('Submission of Previous CCTV Recordings')" />
    <x-text-input id="sopcctvrDocument3" class="block mt-1 w-full bg-white dark:text-black" type="file" name="sopcctvr3" placeholder="Please upload your document here (PDF)" value="{{ old('sopcctvr3') }}" autocomplete="sopcctvr3" onchange="previewDocument(event, 'sopcctvrPreviewContainer3', 'sopcctvrPreview3')" />
    <x-input-error :messages="$errors->get('oropfafns3')" class="mt-2" />

    <!-- Document Preview -->
    <div id="sopcctvrPreviewContainer3"  style="display:none; margin-top: 20px; text-align: center; position: absolute; top: 73px;  left:33%;">
        <iframe id="sopcctvrPreview3" src="#" style="width: 80vh; height: 80vh; border: 1px solid #ccc;"></iframe>
        <!-- <h3 style="color:blue;">Preview CCTV Recordings</h3> -->
    </div>
</div>

</div>

<div id="next4" style="display: none;">

   <!-- Document Title -->
   <div id="qualificationTitle4" class="mt-4">
            <h2>Please upload your document here (PDF)</h2>
        </div>

        <script>
    // Handle qualification selection and dynamically update Step 2 title
    document.getElementById('qualification4').addEventListener('change', function() {
        const qualification4 = this.value;
        const titleElement = document.getElementById('qualificationTitle4');

        // Update title based on selected qualification
        if (qualification4) {
            titleElement.innerHTML = `<h3>Provide PDF for ${qualification4}</h3>`;
        }
    });
</script>

<!-- Endorsement Letter To TESDA -->
<div class="mt-4">
    <x-input-label class="text-white" for="elttDocument" :value="__('Endorsement Letter To TESDA')" />
    <x-text-input id="elttDocument4" class="block mt-1 w-full bg-white dark:text-black" type="file" name="eltt4" placeholder="Please upload your document here (PDF)" value="{{ old('eltt4') }}" autocomplete="eltt4" onchange="previewDocument(event, 'elttPreviewContainer4', 'elttPreview4')" />
    <x-input-error :messages="$errors->get('eltt4')" class="mt-2" />

    <!-- Document Preview -->
    <div id="elttPreviewContainer4" style="display:none; margin-top: 20px; text-align: center; position: absolute; top: 73px; left:33%;">
    <iframe id="elttPreview4" src="#" style="width: 80vh; height: 80vh; border: 1px solid #ccc;"></iframe>
    <!-- <h3 style="color:blue;">Preview Endorsement Letter</h3> -->
</div>
</div>


<!-- Request Form For Test Package -->
<div class="mt-4">
    <x-input-label class="text-white" for="rfftpDocument" :value="__('Request Form For Test Package')" />
    <x-text-input id="rfftpDocument4" class="block mt-1 w-full bg-white dark:text-black" type="file" name="rfftp4" placeholder="Please upload your document here (PDF)" value="{{ old('rfftp4') }}" autocomplete="rfftp4" onchange="previewDocument(event, 'rfftpPreviewContainer4', 'rfftpPreview4')" />
    <x-input-error :messages="$errors->get('rfftp4')" class="mt-2" />

    <!-- Document Preview -->
    <div id="rfftpPreviewContainer4" style="display:none; margin-top: 20px; text-align: center; position: absolute; top: 73px; left:33%;">
        <iframe id="rfftpPreview4" src="#" style="width: 80vh; height: 80vh; border: 1px solid #ccc;"></iframe>
        <!-- <h3 style="color:blue;">Preview Request Form</h3> -->
    </div>

</div>

<!-- Official Receipt of Payment for Assessment for Non-Scholar -->
<div class="mt-4" class="text-white" style="display: none;" id="orInputContainer4">
    <x-input-label for="oropfafnsDocument4" :value="__('Official Receipt of Payment for Assessment for Non-Scholar')" />
    <x-text-input id="oropfafnsDocument4" class="block mt-1 w-full bg-white dark:text-black" type="file" name="oropfafns4" placeholder="Please upload your document here (PDF)" value="{{ old('oropfafns4') }}" autocomplete="oropfafns4" onchange="previewDocument(event, 'oropfafnsPreviewContainer4', 'oropfafnsPreview4')"/>
    <x-input-error :messages="$errors->get('oropfafns4')" class="mt-2" />

    <!-- Document Preview -->
    <div id="oropfafnsPreviewContainer4"  style="display:none; margin-top: 20px; text-align: center; position: absolute; top: 73px;  left:33%;">
        <iframe id="oropfafnsPreview4" src="#" style="width: 80vh; height: 80vh; border: 1px solid #ccc;"></iframe>
        <!-- <h3 style="color:blue;">Preview Official Receipt</h3> -->
    </div>
</div>


<!-- Submission of Previous CCTV Recordings -->
<div class="mt-4">
    <x-input-label class="text-white" for="sopcctvrDocument4" :value="__('Submission of Previous CCTV Recordings')" />
    <x-text-input id="sopcctvrDocument4" class="block mt-1 w-full bg-white dark:text-black" type="file" name="sopcctvr4" placeholder="Please upload your document here (PDF)" value="{{ old('sopcctvr4') }}" autocomplete="sopcctvr4" onchange="previewDocument(event, 'sopcctvrPreviewContainer4', 'sopcctvrPreview4')" />
    <x-input-error :messages="$errors->get('oropfafns4')" class="mt-2" />

    <!-- Document Preview -->
    <div id="sopcctvrPreviewContainer4"  style="display:none; margin-top: 20px; text-align: center; position: absolute; top: 73px;  left:33%;">
        <iframe id="sopcctvrPreview4" src="#" style="width: 80vh; height: 80vh; border: 1px solid #ccc;"></iframe>
        <!-- <h3 style="color:blue;">Preview CCTV Recordings</h3> -->
    </div>
</div>

</div>



<script>
    document.addEventListener("DOMContentLoaded", function () {
        let nextSection = 1;
        const nextButton = document.getElementById('next');
        
        const qualification2 = document.getElementById('qualification2');
        const qualification3 = document.getElementById('qualification3');
        const qualification4 = document.getElementById('qualification4');

        function checkQualification2() {
            console.log("Checking qualification2...");
            const q2 = qualification2.value.trim();
            if (q2 !== "") {
                document.getElementById('next2').style.display = 'block';
                console.log("Next section 2 is now visible!");
            } else {
                document.getElementById('next2').style.display = 'none';
                console.log("Next section 2 is hidden.");
            }
        }

        function checkQualification3() {
            console.log("Checking qualification3...");
            const q3 = qualification3.value.trim();
            if (q3 !== "") {
                document.getElementById('next3').style.display = 'block';
                console.log("Next section 3 is now visible!");
            } else {
                document.getElementById('next3').style.display = 'none';
                console.log("Next section 3 is hidden.");
            }
        }

        function checkQualification4() {
            console.log("Checking qualification4...");
            const q4 = qualification4.value.trim();
            if (q4 !== "") {
                document.getElementById('next4').style.display = 'block';
                console.log("Next section 4 is now visible!");
            } else {
                document.getElementById('next4').style.display = 'none';
                console.log("Next section 4 is hidden.");
            }
        }

        qualification2.addEventListener('input', checkQualification2);
        qualification3.addEventListener('input', checkQualification3);
        qualification4.addEventListener('input', checkQualification4);

        // Initial check on page load
        checkQualification2();
        checkQualification3();
        checkQualification4();
    });
</script>


<div class="mt-4">
<!-- Next button -->
<button type="button" id="next" class="mt-4 px-4 py-2 bg-green-500 text-white rounded-lg hover:bg-green-400 hidden">
    Next
</button>
</div>

	<div class="mt-4">
                                    <button id="submit_button" type="submit" 
                                            class="w-full bg-blue-600 text-white py-2 px-4 rounded-lg hover:bg-blue-700 focus:outline-none focus:ring-4 focus:ring-blue-300" 
                                     >Submit</button>

                                     

                                      <!-- Cancel Button to go back -->
                                      <button type="button" id="cancel_button_step2" 
    class="mt-4 px-4 py-2 bg-gray-300 text-black rounded-lg hover:bg-gray-400"
    onclick="goBackToStep1();">
    Back
</button>

<script>
    function goBackToStep1() {
        // Hide Step 2 and show Step 1
        document.getElementById('step2').style.display = 'none';
        document.getElementById('step1').style.display = 'block';
    }       
</script>

</div>
</div>
</form>




<script>
function previewDocument(event, containerId, iframeId) {
    const file = event.target.files[0];
    const previewContainer = document.getElementById(containerId);
    const previewIframe = document.getElementById(iframeId);

    if (file) {
        if (file.type === 'application/pdf') {
            const fileURL = URL.createObjectURL(file);
            previewIframe.src = fileURL;
            previewContainer.style.display = 'block';
        } else {
            alert('Please upload a valid PDF document.');
            previewContainer.style.display = 'none';
        }
    } else {
        previewContainer.style.display = 'none';
    }
}
</script>

<script src="https://cdn.jsdelivr.net/npm/flatpickr"></script>
<script>
document.getElementById('next_button').addEventListener('click', function () {
    const assessmentDate = document.getElementById('assessment_date').value;
    const qualification = document.getElementById('qualification').value;
    const noOfPax = document.getElementById('no_of_pax').value;
    const trainingStatus = document.getElementById('training_status').value;

    // Step 1 Validation
    if (!assessmentDate || !qualification || !noOfPax || !trainingStatus) {
        alert('Please fill all the required fields in Step 1.');
        return;
    }

    // Scholar-specific validation for Step 1
    if (trainingStatus === 'scholar') {
        const scholarshipType = document.getElementById('scholarship').value;
        if (!scholarshipType) {
            alert('Please select a scholarship type.');
            return;
        }
    }

  
    // Hide Step 1 and Show Step 2
    document.getElementById('step1').style.display = 'none';
    document.getElementById('step2').style.display = 'block';
});



                           
                                const holidays = [
                                    "2025-01-01",  
                                    "2025-02-14",
                                    "2025-04-01", 
                                    "2025-12-25"   
                                ];

                                flatpickr("#assessment_date", {
                                    altInput: true,
                                    altFormat: "F j, Y",
                                    dateFormat: "Y-m-d",
                                    minDate: "today",
                                    onDayCreate: function(dObj, dStr, fp, dayElem) {
                                        const dateStr = dayElem.dateObj.toISOString().slice(0, 10);
                                        if (holidays.includes(dateStr)) {
                                            dayElem.classList.add("holiday");
                                        }
                                    }
                                });
                            </script>
     </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
</x-app-layout>