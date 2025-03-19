
<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/flatpickr/dist/flatpickr.min.css">
                            <style>
                                .holiday {
                                    background-color: red !important;
                                    color: white !important;
                                    border-radius: 50%;
                                    font-weight: bold;
                                }
                            </style>

<form action="{{ route('assessments.oneUpdate', $assessment->id) }}" method="POST" class="space-y-6" enctype="multipart/form-data">
@csrf
@method('PUT')

				<div id="step1">

                <h2 class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight">
        <i class="fas fa-calendar-alt mr-2"></i>
        {{ __('Update Assessment Schedule') }}
    </h2><br>

   <div>
    <label for="assessment_date" class="block text-sm font-medium mb-2">
        Desired Date of Assessment:    </label>
    <input class="w-full px-4 py-2 border rounded-lg focus:ring focus:ring-blue-300 bg-white dark:border-gray-600 dark:text-black"
        type="date" 

        name="assessment_date"
        value="{{  $assessment->assessment_date }}"
     
        required 
    >
</div>


<div>
    <label for="qualification" class="block text-sm font-medium mb-2">
        Qualification:
    </label>
    <select id="qualification" name="qualification"
        class="w-full px-4 py-2 border rounded-lg focus:ring focus:ring-blue-300 bg-white dark:border-white-600 dark:text-black">
        <option value="FBS NC II" {{ $assessment->qualification == 'FBS NC II' ? 'selected' : '' }}>FBS NC II</option>
        <option value="CSS NC II" {{ $assessment->qualification == 'CSS NC II' ? 'selected' : '' }}>CSS NC II</option>
        <option value="Cook NC II" {{ $assessment->qualification == 'Cook NC II' ? 'selected' : '' }}>Cook NC II</option>
        <option value="Driving NC II" {{ $assessment->qualification == 'Driving NC II' ? 'selected' : '' }}>Driving NC II</option>
    </select>
</div>

                                <div>
                                    <label for="no_of_pax" class="block text-sm font-medium mb-2">
                                        Number of Pax:
                                    </label>
                                    <select id="no_of_pax" name="no_of_pax"
					    class="w-full px-4 py-2 border rounded-lg focus:ring focus:ring-blue-300 bg-white dark:border-gray-600 dark:text-black">
                                        @for ($i = 1; $i <= 10; $i++)
                                            <option value="{{ $i }}" {{ $assessment->no_of_pax == $i ? 'selected' : '' }}>{{ $i }}</option>
                                        @endfor
                                    </select>
                                </div>

                                <div>
    <label for="training_status" class="block text-sm font-medium mb-2">
        Training Status:
    </label>
    <select id="training_status" name="training_status"
        class="w-full px-4 py-2 border rounded-lg focus:ring focus:ring-blue-300 bg-white dark:border-gray-600 dark:text-black">
        <option value="scholar" {{ $assessment->training_status == 'scholar' ? 'selected' : '' }}>Scholar</option>
        <option value="non-scholar" {{ $assessment->training_status == 'non-scholar' ? 'selected' : '' }}>Non-Scholar</option>
        <option value="mix" {{ $assessment->training_status == 'mix' ? 'selected' : '' }}>Mix</option>
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
    </select>
</div>



<!-- Scholar Section -->
<div id="scholarship_div" style="display: none;">
    <label for="scholarship" class="block text-sm font-medium mb-2">
        Scholarship Type:
    </label>
    <select id="scholarship" name="type_of_scholar" 
        class="w-full px-4 py-2 border rounded-lg focus:ring focus:ring-blue-300 bg-white dark:border-gray-600 dark:text-black">
        <option value="ttsp"  {{ $assessment->type_of_scholar == 'ttsp' ? 'selected' : '' }}>TTSP</option>
        <option value="cfsp"  {{ $assessment->type_of_scholar == 'cfsp' ? 'selected' : '' }}>CFSP</option>
        <option value="uaqtea"  {{ $assessment->type_of_scholar == 'uaqtea' ? 'selected' : '' }}>UAQTEA</option>
        <option value="twsp"  {{ $assessment->type_of_scholar == 'twsp' ? 'selected' : '' }}>TWSP</option>
    </select>
</div>

<!-- Non-Scholar Section -->
<div id="non_scholarship_div" style="display: none;">
    <label for="non_scholarship" class="block text-sm font-medium mb-2">
        Non-Scholarship Type:
    </label>
    <select id="non_scholarship" name="type_of_non_scholar" 
        class="w-full px-4 py-2 border rounded-lg focus:ring focus:ring-blue-300 bg-white dark:border-gray-600 dark:text-black">
        <option value="Walk-In" {{ $assessment->type_of_non_scholar == 'Walk-In' ? 'selected' : '' }}>Walk-In</option>
        <option value="CAWS" {{ $assessment->type_of_non_scholar == 'CAWS' ? 'selected' : '' }}>CAWS</option>
        <option value="Three" {{ $assessment->type_of_non_scholar == 'Three' ? 'selected' : '' }}>Three</option>
        <option value="Four" {{ $assessment->type_of_non_scholar == 'Four' ? 'selected' : '' }}>Four</option>
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
                <option value="FBS NC II" {{ $assessment->qualification2 == 'FBS NC II' ? 'selected' : '' }}>FBS NC II</option>
                <option value="CSS NC II" {{ $assessment->qualification2 == 'CSS NC II' ? 'selected' : '' }}>CSS NC II</option>
                <option value="Cook NC II" {{ $assessment->qualification2 == 'Cook NC II' ? 'selected' : '' }}>Cook NC II</option>
                <option value="Driving NC II" {{ $assessment->qualification2 == 'Driving NC II' ? 'selected' : '' }}>Driving NC II</option>
            </select>
        </div>

        <div>
            <label for="no_of_pax2" class="block text-sm font-medium mb-2">
                Number of Pax:
            </label>
            <select id="no_of_pax2" name="no_of_pax2" 
                    class="w-full px-4 py-2 border rounded-lg focus:ring focus:ring-blue-300 bg-white dark:border-gray-600 dark:text-black">
                @for ($i = 1; $i <= 10; $i++)
                    <option value="{{ $i }}" {{ $assessment->no_of_pax2 == $i ? 'selected' : '' }}>{{ $i }}</option>
                @endfor
            </select>
        </div>

        <div>
            <label for="training_status2" class="block text-sm font-medium mb-2">
                Training Status:
            </label>
            <select id="training_status2" name="training_status2" 
                    class="w-full px-4 py-2 border rounded-lg focus:ring focus:ring-blue-300 bg-white dark:border-gray-600 dark:text-black">
                    <option value="scholar" {{ $assessment->training_status2 == 'scholar' ? 'selected' : '' }}>Scholar</option>
        <option value="non-scholar" {{ $assessment->training_status2 == 'non-scholar' ? 'selected' : '' }}>Non-Scholar</option>
        <option value="mix" {{ $assessment->training_status2 == 'mix' ? 'selected' : '' }}>Mix</option>
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
    </select>
</div>





        <div id="scholarship_div2" style="display: none;">
            <label for="scholarship2" class="block text-sm font-medium mb-2">
                Scholarship Type:
            </label>
            <select id="scholarship2" name="type_of_scholar2" 
                    class="w-full px-4 py-2 border rounded-lg focus:ring focus:ring-blue-300 bg-white dark:border-gray-600 dark:text-black">
                    <option value="ttsp"  {{ $assessment->type_of_scholar2 == 'ttsp' ? 'selected' : '' }}>TTSP</option>
        <option value="cfsp"  {{ $assessment->type_of_scholar2 == 'cfsp' ? 'selected' : '' }}>CFSP</option>
        <option value="uaqtea"  {{ $assessment->type_of_scholar2 == 'uaqtea' ? 'selected' : '' }}>UAQTEA</option>
        <option value="twsp"  {{ $assessment->type_of_scholar2 == 'twsp' ? 'selected' : '' }}>TWSP</option>
            </select>
        </div>

        <div id="non_scholarship_div2" style="display: none;">
            <label for="non_scholarship2" class="block text-sm font-medium mb-2">
                Non Scholarship Type:
            </label>
            <select id="non_scholarship2" name="type_of_non_scholar2" 
                    class="w-full px-4 py-2 border rounded-lg focus:ring focus:ring-blue-300 bg-white dark:border-gray-600 dark:text-black">
                    <option value="Walk-In" {{ $assessment->type_of_non_scholar2 == 'Walk-In' ? 'selected' : '' }}>Walk-In</option>
        <option value="CAWS" {{ $assessment->type_of_non_scholar2 == 'CAWS' ? 'selected' : '' }}>CAWS</option>
        <option value="Three" {{ $assessment->type_of_non_scholar2 == 'Three' ? 'selected' : '' }}>Three</option>
        <option value="Four" {{ $assessment->type_of_non_scholar2 == 'Four' ? 'selected' : '' }}>Four</option>
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
                    <option value="FBS NC II" {{ $assessment->qualification3 == 'FBS NC II' ? 'selected' : '' }}>FBS NC II</option>
        <option value="CSS NC II" {{ $assessment->qualification3 == 'CSS NC II' ? 'selected' : '' }}>CSS NC II</option>
        <option value="Cook NC II" {{ $assessment->qualification3 == 'Cook NC II' ? 'selected' : '' }}>Cook NC II</option>
        <option value="Driving NC II" {{ $assessment->qualification3 == 'Driving NC II' ? 'selected' : '' }}>Driving NC II</option>
            </select>
        </div>

        <div>
            <label for="no_of_pax3" class="block text-sm font-medium mb-2">
                Number of Pax:
            </label>
            <select id="no_of_pax3" name="no_of_pax3" 
                    class="w-full px-4 py-2 border rounded-lg focus:ring focus:ring-blue-300 bg-white dark:border-gray-600 dark:text-black">
                @for ($i = 1; $i <= 10; $i++)
                    <option value="{{ $i }}" {{ $assessment->no_of_pax3 == $i ? 'selected' : '' }}>{{ $i }}</option>
                @endfor
            </select>
        </div>

        <div>
            <label for="training_status3" class="block text-sm font-medium mb-2">
                Training Status:
            </label>
            <select id="training_status3" name="training_status3" 
                    class="w-full px-4 py-2 border rounded-lg focus:ring focus:ring-blue-300 bg-white dark:border-gray-600 dark:text-black">
                    <option value="scholar" {{ $assessment->training_status3 == 'scholar' ? 'selected' : '' }}>Scholar</option>
        <option value="non-scholar" {{ $assessment->training_status3 == 'non-scholar' ? 'selected' : '' }}>Non-Scholar</option>
        <option value="mix" {{ $assessment->training_status3 == 'mix' ? 'selected' : '' }}>Mix</option>
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
                    <option value="ttsp"  {{ $assessment->type_of_scholar3 == 'ttsp' ? 'selected' : '' }}>TTSP</option>
        <option value="cfsp"  {{ $assessment->type_of_scholar3 == 'cfsp' ? 'selected' : '' }}>CFSP</option>
        <option value="uaqtea"  {{ $assessment->type_of_scholar3 == 'uaqtea' ? 'selected' : '' }}>UAQTEA</option>
        <option value="twsp"  {{ $assessment->type_of_scholar3 == 'twsp' ? 'selected' : '' }}>TWSP</option>
            </select>
        </div>

        <div id="non_scholarship_div3" style="display: none;">
            <label for="non_scholarship3" class="block text-sm font-medium mb-2">
                Non Scholarship Type:
            </label>
            <select id="non_scholarship3" name="type_of_non_scholar3" 
                    class="w-full px-4 py-2 border rounded-lg focus:ring focus:ring-blue-300 bg-white dark:border-gray-600 dark:text-black">
                    <option value="Walk-In" {{ $assessment->type_of_non_scholar3 == 'Walk-In' ? 'selected' : '' }}>Walk-In</option>
        <option value="CAWS" {{ $assessment->type_of_non_scholar3 == 'CAWS' ? 'selected' : '' }}>CAWS</option>
        <option value="Three" {{ $assessment->type_of_non_scholar3 == 'Three' ? 'selected' : '' }}>Three</option>
        <option value="Four" {{ $assessment->type_of_non_scholar3 == 'Four' ? 'selected' : '' }}>Four</option>
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
                    <option value="FBS NC II" {{ $assessment->qualification4 == 'FBS NC II' ? 'selected' : '' }}>FBS NC II</option>
        <option value="CSS NC II" {{ $assessment->qualification4 == 'CSS NC II' ? 'selected' : '' }}>CSS NC II</option>
        <option value="Cook NC II" {{ $assessment->qualification4 == 'Cook NC II' ? 'selected' : '' }}>Cook NC II</option>
        <option value="Driving NC II" {{ $assessment->qualification4 == 'Driving NC II' ? 'selected' : '' }}>Driving NC II</option>
            </select>
        </div>

        <div>
            <label for="no_of_pax4" class="block text-sm font-medium mb-2">
                Number of Pax:
            </label>
            <select id="no_of_pax4" name="no_of_pax4" 
                    class="w-full px-4 py-2 border rounded-lg focus:ring focus:ring-blue-300 bg-white dark:border-gray-600 dark:text-black">
                @for ($i = 1; $i <= 10; $i++)
                    <option value="{{ $i }}" {{ $assessment->no_of_pax4 == $i ? 'selected' : '' }}>{{ $i }}</option>
                @endfor
            </select>
        </div>

        <div>
            <label for="training_status4" class="block text-sm font-medium mb-2">
                Training Status:
            </label>
            <select id="training_status4" name="training_status4" 
                    class="w-full px-4 py-2 border rounded-lg focus:ring focus:ring-blue-300 bg-white dark:border-gray-600 dark:text-black">
                    <option value="scholar" {{ $assessment->training_status4 == 'scholar' ? 'selected' : '' }}>Scholar</option>
        <option value="non-scholar" {{ $assessment->training_status4 == 'non-scholar' ? 'selected' : '' }}>Non-Scholar</option>
        <option value="mix" {{ $assessment->training_status4 == 'mix' ? 'selected' : '' }}>Mix</option>

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
                    <option value="Walk-In" {{ $assessment->type_of_non_scholar4 == 'Walk-In' ? 'selected' : '' }}>Walk-In</option>
        <option value="CAWS" {{ $assessment->type_of_non_scholar4 == 'CAWS' ? 'selected' : '' }}>CAWS</option>
        <option value="Three" {{ $assessment->type_of_non_scholar4 == 'Three' ? 'selected' : '' }}>Three</option>
        <option value="Four" {{ $assessment->type_of_non_scholar4 == 'Four' ? 'selected' : '' }}>Four</option>
            </select>
        </div>

        <div id="non_scholarship_div4" style="display: none;">
            <label for="non_scholarship4" class="block text-sm font-medium mb-2">
                Non Scholarship Type:
            </label>
            <select id="non_scholarship4" name="type_of_non_scholar4" 
                    class="w-full px-4 py-2 border rounded-lg focus:ring focus:ring-blue-300 bg-white dark:border-gray-600 dark:text-black">
                    <option value="Walk-In" {{ $assessment->type_of_non_scholar4 == 'Walk-In' ? 'selected' : '' }}>Walk-In</option>
        <option value="CAWS" {{ $assessment->type_of_non_scholar4 == 'CAWS' ? 'selected' : '' }}>CAWS</option>
        <option value="Three" {{ $assessment->type_of_non_scholar4 == 'Three' ? 'selected' : '' }}>Three</option>
        <option value="Four" {{ $assessment->type_of_non_scholar4 == 'Four' ? 'selected' : '' }}>Four</option>
            </select>
        </div>
    </div>

    <script>
    document.getElementById('next_button_step2').addEventListener('click', function() {
        // Hide step1 and show step2
        document.getElementById('step1').style.display = 'none';
        document.getElementById('step2').style.display = 'block';
    });
</script>
    
<button type="button" id="next_button_step2" 
        class="mt-4 px-4 py-2 bg-blue-900 text-white rounded-lg hover:bg-blue-600">
    Apply Schedule
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
    <div style="display: flex; align-items: center; gap: 20px;">
        <!-- Left Side: File Input -->
        <div style="flex: 1;">
    
        <x-input-label class="text-white" for="elttDocument" :value="__('Endorsement Letter To TESDA')" />
            <x-text-input id="elttDocument" class="block w-full bg-white dark:text-black" type="file" name="eltt" 
                placeholder="Please upload your document here (PDF)" value="{{ $assessment->eltt }}" 
                autocomplete="eltt" onchange="previewDocument(event, 'pdf', 'pdfView')" required/>
            <x-input-error :messages="$errors->get('eltt')" class="mt-2" />

            <x-input-label class="text-white" for="rfftpDocument" :value="__('Request Form For Test Package')" />
    <x-text-input id="rfftpDocument" class="block mt-1 w-full bg-white dark:text-black" type="file" name="rfftp" placeholder="Please upload your document here (PDF)" value="{{ $assessment->rfftp }}" autocomplete="rfftp" onchange="previewDocument(event, 'pdf', 'pdfView')" required/>
    <x-input-error :messages="$errors->get('rfftp')" class="mt-2" />

    <div style="display: none;" id="orInputContainer">
    <x-input-label for="oropfafnsDocument" :value="__('Official Receipt of Payment for Assessment for Non-Scholar')" />
    <x-text-input id="oropfafnsDocument" class="block mt-1 w-full bg-white dark:text-black" type="file" name="oropfafns" placeholder="Please upload your document here (PDF)" value="{{ $assessment->oropfafns }}" autocomplete="oropfafns" onchange="previewDocument(event, 'pdf', 'pdfView')"/>
    <x-input-error :messages="$errors->get('oropfafns')" class="mt-2" />
    </div>

    <x-input-label class="text-white" for="sopcctvrDocument" :value="__('Submission of Previous CCTV Recordings')" />
    <x-text-input id="sopcctvrDocument" class="block mt-1 w-full bg-white dark:text-black" type="file" name="sopcctvr" placeholder="Please upload your document here (PDF)" value="{{ $assessment->sopcctvr }}" autocomplete="sopcctvr" onchange="previewDocument(event, 'pdf', 'pdfView')" required/>
    <x-input-error :messages="$errors->get('sopcctvr')" class="mt-2" />

        </div>
        <!-- Right Side: PDF Preview -->
        <div id="pdf" style="display: none; flex: 2;">
            <iframe id="pdfView" src="#" style="width: 300px; height: 300px; border: 1px solid #ccc;"></iframe>
        </div>
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
    <div style="display: flex; align-items: center; gap: 20px;">
        <!-- Left Side: File Input -->
        <div style="flex: 1;">
    
        <x-input-label class="text-white" for="elttDocument2" :value="__('Endorsement Letter To TESDA')" />
            <x-text-input id="elttDocument2" class="block w-full bg-white dark:text-black" type="file" name="eltt2" 
                placeholder="Please upload your document here (PDF)" value="{{ $assessment->eltt2 }}" 
                autocomplete="eltt2" onchange="previewDocument(event, 'pdf2', 'pdfView2')"/>
            <x-input-error :messages="$errors->get('eltt2')" class="mt-2" />

            <x-input-label class="text-white" for="rfftpDocument2" :value="__('Request Form For Test Package')" />
    <x-text-input id="rfftpDocument2" class="block mt-1 w-full bg-white dark:text-black" type="file" name="rfftp2" placeholder="Please upload your document here (PDF)" value="{{ $assessment->rfftp2 }}" autocomplete="rfftp2" onchange="previewDocument(event, 'pdf2', 'pdfView2')"/>
    <x-input-error :messages="$errors->get('rfftp2')" class="mt-2" />

    <div style="display: none;" id="orInputContainer2">
    <x-input-label for="oropfafnsDocument2" :value="__('Official Receipt of Payment for Assessment for Non-Scholar')" />
    <x-text-input id="oropfafnsDocument2" class="block mt-1 w-full bg-white dark:text-black" type="file" name="oropfafns2" placeholder="Please upload your document here (PDF)" value="{{ $assessment->oropfafns2 }}" autocomplete="oropfafns2" onchange="previewDocument(event, 'pdf2', 'pdfView2')"/>
    <x-input-error :messages="$errors->get('oropfafns2')" class="mt-2" />
    </div>

    <x-input-label class="text-white" for="sopcctvrDocument2" :value="__('Submission of Previous CCTV Recordings')" />
    <x-text-input id="sopcctvrDocument2" class="block mt-1 w-full bg-white dark:text-black" type="file" name="sopcctvr2" placeholder="Please upload your document here (PDF)" value="{{ $assessment->sopcctvr2 }}" autocomplete="sopcctvr2" onchange="previewDocument(event, 'pdf2', 'pdfView2')"/>
    <x-input-error :messages="$errors->get('sopcctvr2')" class="mt-2" />

        </div>
        <!-- Right Side: PDF Preview -->
        <div id="pdf2" style="display: none; flex: 2;">
            <iframe id="pdfView2" src="#" style="width: 300px; height: 300px; border: 1px solid #ccc; background-color:blue"></iframe>
        </div>
    </div>
</div>


</div>




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
    <div style="display: flex; align-items: center; gap: 20px;">
        <!-- Left Side: File Input -->
        <div style="flex: 1;">
    
        <x-input-label class="text-white" for="elttDocument3" :value="__('Endorsement Letter To TESDA')" />
            <x-text-input id="elttDocument3" class="block w-full bg-white dark:text-black" type="file" name="eltt3" 
                placeholder="Please upload your document here (PDF)" value="{{ $assessment->eltt3 }}" 
                autocomplete="eltt3" onchange="previewDocument(event, 'pdf3', 'pdfView3')"/>
            <x-input-error :messages="$errors->get('eltt3')" class="mt-2" />

            <x-input-label class="text-white" for="rfftpDocument3" :value="__('Request Form For Test Package')" />
    <x-text-input id="rfftpDocument3" class="block mt-1 w-full bg-white dark:text-black" type="file" name="rfftp3" placeholder="Please upload your document here (PDF)" value="{{ $assessment->rfftp3 }}" autocomplete="rfftp3" onchange="previewDocument(event, 'pdf3', 'pdfView3')"/>
    <x-input-error :messages="$errors->get('rfftp3')" class="mt-2" />

    <div style="display: none;" id="orInputContainer3">
    <x-input-label for="oropfafnsDocument3" :value="__('Official Receipt of Payment for Assessment for Non-Scholar')" />
    <x-text-input id="oropfafnsDocument3" class="block mt-1 w-full bg-white dark:text-black" type="file" name="oropfafns3" placeholder="Please upload your document here (PDF)" value="{{ $assessment->oropfafns3 }}" autocomplete="oropfafns3" onchange="previewDocument(event, 'pdf3', 'pdfView3')"/>
    <x-input-error :messages="$errors->get('oropfafns3')" class="mt-2" />
    </div>

    <x-input-label class="text-white" for="sopcctvrDocument3" :value="__('Submission of Previous CCTV Recordings')" />
    <x-text-input id="sopcctvrDocument3" class="block mt-1 w-full bg-white dark:text-black" type="file" name="sopcctvr3" placeholder="Please upload your document here (PDF)" value="{{ $assessment->sopcctvr3 }}" autocomplete="sopcctvr3" onchange="previewDocument(event, 'pdf3', 'pdfView3')"/>
    <x-input-error :messages="$errors->get('sopcctvr3')" class="mt-2" />

        </div>
        <!-- Right Side: PDF Preview -->
        <div id="pdf3" style="display: none; flex: 2;">
            <iframe id="pdfView3" src="#" style="width: 300px; height: 300px; border: 1px solid #ccc;"></iframe>
        </div>
    </div>
</div>






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
    <div style="display: flex; align-items: center; gap: 20px;">
        <!-- Left Side: File Input -->
        <div style="flex: 1;">
    
        <x-input-label class="text-white" for="elttDocument4" :value="__('Endorsement Letter To TESDA')" />
            <x-text-input id="elttDocument4" class="block w-full bg-white dark:text-black" type="file" name="eltt4" 
                placeholder="Please upload your document here (PDF)" value="{{ $assessment->eltt4 }}" 
                autocomplete="eltt4" onchange="previewDocument(event, 'pdf4', 'pdfView4')"/>
            <x-input-error :messages="$errors->get('eltt4')" class="mt-2" />

            <x-input-label class="text-white" for="rfftpDocument4" :value="__('Request Form For Test Package')" />
    <x-text-input id="rfftpDocument4" class="block mt-1 w-full bg-white dark:text-black" type="file" name="rfftp4" placeholder="Please upload your document here (PDF)" value="{{ $assessment->rfftp4 }}" autocomplete="rfftp4" onchange="previewDocument(event, 'pdf4', 'pdfView4')"/>
    <x-input-error :messages="$errors->get('rfftp4')" class="mt-2" />

    <div style="display: none;" id="orInputContainer4">
    <x-input-label for="oropfafnsDocument4" :value="__('Official Receipt of Payment for Assessment for Non-Scholar')" />
    <x-text-input id="oropfafnsDocument4" class="block mt-1 w-full bg-white dark:text-black" type="file" name="oropfafns4" placeholder="Please upload your document here (PDF)" value="{{ $assessment->oropfafns4 }}" autocomplete="oropfafns4" onchange="previewDocument(event, 'pdf4', 'pdfView4')"/>
    <x-input-error :messages="$errors->get('oropfafns4')" class="mt-2" />
    </div>

    <x-input-label class="text-white" for="sopcctvrDocument4" :value="__('Submission of Previous CCTV Recordings')" />
    <x-text-input id="sopcctvrDocument4" class="block mt-1 w-full bg-white dark:text-black" type="file" name="sopcctvr4" placeholder="Please upload your document here (PDF)" value="{{ $assessment->sopcctvr4 }}" autocomplete="sopcctvr4" onchange="previewDocument(event, 'pdf4', 'pdfView4')"/>
    <x-input-error :messages="$errors->get('sopcctvr4')" class="mt-2" />

        </div>
        <!-- Right Side: PDF Preview -->
        <div id="pdf4" style="display: none; flex: 2;">
            <iframe id="pdfView4" src="#" style="width: 300px; height: 300px; border: 1px solid #ccc;"></iframe>
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

