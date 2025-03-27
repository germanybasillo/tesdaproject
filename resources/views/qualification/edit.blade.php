<x-app-layout>
<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/flatpickr/dist/flatpickr.min.css">
<div class="container mx-auto">
<form action="{{ route('assessments.oneUpdate', $assessment->id) }}" method="POST" class="space-y-6" enctype="multipart/form-data">
    @csrf
    @method('PUT')

				<div id="step1">

                <h2 class="font-semibold text-xl text-gray-800 dark:text-gray-900 leading-tight">
        <i class="fas fa-calendar-alt mr-2"></i>
        {{ __('Update Assessment Schedule') }}
    </h2><br>

   <div>
    <label for="assessment_date" class="block text-sm font-medium mb-2">
        Desired Date of Assessment:    </label>
    <input class="w-full px-4 py-2 border rounded-lg focus:ring focus:ring-blue-300 bg-white dark:border-gray-600 dark:text-black"
        type="date" 
        id="assessment_date" 
        name="assessment_date"
        value="{{ old('assessment_date', $assessment->assessment_date) }}"
        required 
    >
</div>

@if(!empty($assessment->qualification))

                         <!-- Qualification Input -->
        <div>
            <label for="qualification" class="block text-sm font-medium mb-2">
                Qualification:
            </label>
            <select id="qualification" name="qualification"
                class="w-full px-4 py-2 border rounded-lg focus:ring focus:ring-blue-300 bg-white dark:border-gray-600 dark:text-black">
                <option value="" disabled>Select your qualification</option>
                <option value="FBS NC II" {{ $assessment->qualification == 'FBS NC II' ? 'selected' : '' }}>FBS NC II</option>
                <option value="CSS NC II" {{ $assessment->qualification == 'CSS NC II' ? 'selected' : '' }}>CSS NC II</option>
                <option value="Cook NC II" {{ $assessment->qualification == 'Cook NC II' ? 'selected' : '' }}>Cook NC II</option>
                <option value="Driving NC II" {{ $assessment->qualification == 'Driving NC II' ? 'selected' : '' }}>Driving NC II</option>
            </select>
        </div>

                               <!-- Number of Pax -->
        <div>
            <label for="no_of_pax" class="block text-sm font-medium mb-2">
                Number of Pax:
            </label>
            <select id="no_of_pax" name="no_of_pax"
                class="w-full px-4 py-2 border rounded-lg focus:ring focus:ring-blue-300 bg-white dark:border-gray-600 dark:text-black">
                <option value="" disabled>Select your number of pax</option>
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
        <option value="" disabled>Select your training status</option>
        <option value="scholar" {{ $assessment->training_status == 'scholar' ? 'selected' : '' }}>Scholar</option>
        <option value="non-scholar" {{ $assessment->training_status == 'non-scholar' ? 'selected' : '' }}>Non-Scholar</option>
        <option value="mix" {{ $assessment->training_status == 'mix' ? 'selected' : '' }}>Mix</option>
    </select>
</div>

<script>
    // Auto-show the sections based on selected training_status on page load
    document.addEventListener('DOMContentLoaded', function () {
        updateTrainingStatus(); // Call function on page load
    });

    document.getElementById('training_status').addEventListener('change', function () {
        updateTrainingStatus(); // Call function on change
    });

    function updateTrainingStatus() {
        var trainingStatus = document.getElementById('training_status').value;
        var scholarshipDiv = document.getElementById('scholarship_div');
        var nonScholarshipDiv = document.getElementById('non_scholarship_div');
        var mix_no_container = document.getElementById('mix_no_container');

        if (trainingStatus === 'scholar') {
            scholarshipDiv.style.display = 'block';
            nonScholarshipDiv.style.display = 'none';
            mix_no_container.style.display = 'none';
        } else if (trainingStatus === 'non-scholar') {
            scholarshipDiv.style.display = 'none';
            nonScholarshipDiv.style.display = 'block';
            mix_no_container.style.display = 'none';
        } else if (trainingStatus === 'mix') {
            scholarshipDiv.style.display = 'block';
            nonScholarshipDiv.style.display = 'block';
            mix_no_container.style.display = 'block';
        } else {
            // Hide all if no selection
            scholarshipDiv.style.display = 'none';
            nonScholarshipDiv.style.display = 'none';
            mix_no_container.style.display = 'none';
        }
    }
</script>

<!-- Mix Number Container (For Scholar Mix) -->
<div id="mix_no_container" style="display: {{ $assessment->training_status == 'mix' ? 'block' : 'none' }};">
    <label for="mix_no" class="block text-sm font-medium mb-2">
        Number of Scholar:
    </label>
    <select id="mix_no" name="mix_no"
        class="w-full px-4 py-2 border rounded-lg focus:ring focus:ring-blue-300 bg-white dark:border-gray-600 dark:text-black">
        <option value="" disabled>Select your number of Scholar</option>
        @for ($i = 1; $i <= $assessment->no_of_pax - 1; $i++)
            <option value="{{ $i }}" {{ $assessment->mix_no == $i ? 'selected' : '' }}>{{ $i }}</option>
        @endfor
    </select>
</div>

<!-- Scholar Section -->
<div id="scholarship_div" style="display: {{ $assessment->training_status == 'scholar' || $assessment->training_status == 'mix' ? 'block' : 'none' }};">
    <label for="scholarship" class="block text-sm font-medium mb-2">
        Scholarship Type:
    </label>
    <select id="scholarship" name="type_of_scholar"
        class="w-full px-4 py-2 border rounded-lg focus:ring focus:ring-blue-300 bg-white dark:border-gray-600 dark:text-black">
        <option value="" disabled>Select your scholarship type</option>
        <option value="ttsp" {{ $assessment->type_of_scholar == 'ttsp' ? 'selected' : '' }}>TTSP</option>
        <option value="cfsp" {{ $assessment->type_of_scholar == 'cfsp' ? 'selected' : '' }}>CFSP</option>
        <option value="uaqtea" {{ $assessment->type_of_scholar == 'uaqtea' ? 'selected' : '' }}>UAQTEA</option>
        <option value="twsp" {{ $assessment->type_of_scholar == 'twsp' ? 'selected' : '' }}>TWSP</option>
    </select>
</div>

<!-- Non-Scholar Section -->
<div id="non_scholarship_div" style="display: {{ $assessment->training_status == 'non-scholar' || $assessment->training_status == 'mix' ? 'block' : 'none' }};">
    <label for="non_scholarship" class="block text-sm font-medium mb-2">
        Non-Scholarship Type:
    </label>
    <select id="non_scholarship" name="type_of_non_scholar"
        class="w-full px-4 py-2 border rounded-lg focus:ring focus:ring-blue-300 bg-white dark:border-gray-600 dark:text-black">
        <option value="" disabled>Select your non-scholarship type</option>
        <option value="Walk-In" {{ $assessment->type_of_non_scholar == 'Walk-In' ? 'selected' : '' }}>Walk-In</option>
        <option value="CAWS" {{ $assessment->type_of_non_scholar == 'CAWS' ? 'selected' : '' }}>CAWS</option>
        <option value="Three" {{ $assessment->type_of_non_scholar == 'Three' ? 'selected' : '' }}>Three</option>
        <option value="Four" {{ $assessment->type_of_non_scholar == 'Four' ? 'selected' : '' }}>Four</option>
    </select>
</div>

@endif
               

@if(!empty($assessment->qualification2))

        <div>
            <label for="qualification2" class="block text-sm font-medium mb-2">
                Qualification:
            </label>
            <select id="qualification2" name="qualification2" 
                    class="w-full px-4 py-2 border rounded-lg focus:ring focus:ring-blue-300 bg-white dark:border-white-600 dark:text-black">
                    <option value="" disabled>Select your qualification</option>
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
                <option value="" disabled>Select your number of pax</option>
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
    <option value="" disabled>Select your training status</option>
    <option value="scholar" {{ $assessment->training_status2 == 'scholar' ? 'selected' : '' }}>Scholar</option>
    <option value="non-scholar" {{ $assessment->training_status2 == 'non-scholar' ? 'selected' : '' }}>Non-Scholar</option>
    <option value="mix" {{ $assessment->training_status2 == 'mix' ? 'selected' : '' }}>Mix</option>
    </select>
        </div>
        
        <script>
    // Auto-show the sections based on selected training_status on page load
    document.addEventListener('DOMContentLoaded', function () {
        updateTrainingStatus2(); // Call function on page load
    });

    document.getElementById('training_status2').addEventListener('change', function () {
        updateTrainingStatus2(); // Call function on change
    });

    function updateTrainingStatus2() {
        var trainingStatus2 = document.getElementById('training_status2').value;
        var scholarshipDiv2 = document.getElementById('scholarship_div2');
        var nonScholarshipDiv2 = document.getElementById('non_scholarship_div2');
        var mix_no_container2 = document.getElementById('mix_no_container2');

        if (trainingStatus2 === 'scholar') {
            scholarshipDiv2.style.display = 'block';
            nonScholarshipDiv2.style.display = 'none';
            mix_no_container2.style.display = 'none';
        } else if (trainingStatus2 === 'non-scholar') {
            scholarshipDiv2.style.display = 'none';
            nonScholarshipDiv2.style.display = 'block';
            mix_no_container2.style.display = 'none';
        } else if (trainingStatus2 === 'mix') {
            scholarshipDiv2.style.display = 'block';
            nonScholarshipDiv2.style.display = 'block';
            mix_no_container2.style.display = 'block';
        } else {
            // Hide all if no selection
            scholarshipDiv2.style.display = 'none';
            nonScholarshipDiv2.style.display = 'none';
            mix_no_container2.style.display = 'none';
        }
    }
</script>


<!-- Mix Number Container (For Scholar Mix) -->
<div id="mix_no_container2" style="display: {{ $assessment->training_status2 == 'mix' ? 'block' : 'none' }};">
    <label for="mix_no2" class="block text-sm font-medium mb-2">
        Number of Scholar:
    </label>
    <select id="mix_no2" name="mix_no2"
        class="w-full px-4 py-2 border rounded-lg focus:ring focus:ring-blue-300 bg-white dark:border-gray-600 dark:text-black">
        <option value="" disabled>Select your number of Scholar</option>
        @for ($i = 1; $i <= $assessment->no_of_pax2 - 1; $i++)
            <option value="{{ $i }}" {{ $assessment->mix_no2 == $i ? 'selected' : '' }}>{{ $i }}</option>
        @endfor
    </select>
</div>



      <!-- Scholar Section -->
<div id="scholarship_div2" style="display: {{ $assessment->training_status2 == 'scholar' || $assessment->training_status2 == 'mix' ? 'block' : 'none' }};">
    <label for="scholarship2" class="block text-sm font-medium mb-2">
        Scholarship Type:
    </label>
    <select id="scholarship2" name="type_of_scholar2"
        class="w-full px-4 py-2 border rounded-lg focus:ring focus:ring-blue-300 bg-white dark:border-gray-600 dark:text-black">
        <option value="" disabled>Select your scholarship type</option>
        <option value="ttsp" {{ $assessment->type_of_scholar2 == 'ttsp' ? 'selected' : '' }}>TTSP</option>
        <option value="cfsp" {{ $assessment->type_of_scholar2 == 'cfsp' ? 'selected' : '' }}>CFSP</option>
        <option value="uaqtea" {{ $assessment->type_of_scholar2 == 'uaqtea' ? 'selected' : '' }}>UAQTEA</option>
        <option value="twsp" {{ $assessment->type_of_scholar2 == 'twsp' ? 'selected' : '' }}>TWSP</option>
    </select>
</div>


<!-- Non-Scholar Section -->
<div id="non_scholarship_div2" style="display: {{ $assessment->training_status2 == 'non-scholar' || $assessment->training_status2 == 'mix' ? 'block' : 'none' }};">
    <label for="non_scholarship2" class="block text-sm font-medium mb-2">
        Non-Scholarship Type:
    </label>
    <select id="non_scholarship2" name="type_of_non_scholar2"
        class="w-full px-4 py-2 border rounded-lg focus:ring focus:ring-blue-300 bg-white dark:border-gray-600 dark:text-black">
        <option value="" disabled>Select your non-scholarship type</option>
        <option value="Walk-In" {{ $assessment->type_of_non_scholar2 == 'Walk-In' ? 'selected' : '' }}>Walk-In</option>
        <option value="CAWS" {{ $assessment->type_of_non_scholar2 == 'CAWS' ? 'selected' : '' }}>CAWS</option>
        <option value="Three" {{ $assessment->type_of_non_scholar2 == 'Three' ? 'selected' : '' }}>Three</option>
        <option value="Four" {{ $assessment->type_of_non_scholar2 == 'Four' ? 'selected' : '' }}>Four</option>
    </select>
</div>

@endif

@if(!empty($assessment->qualification3))

        <div>
            <label for="qualification3" class="block text-sm font-medium mb-2">
                Qualification:
            </label>
            <select id="qualification3" name="qualification3" 
                    class="w-full px-4 py-2 border rounded-lg focus:ring focus:ring-blue-300 bg-white dark:border-white-600 dark:text-black">
                    <option value="" disabled>Select your qualification</option>
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
                <option value="" disabled>Select your number of pax</option>
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
    <option value="" disabled>Select your training status</option>
    <option value="scholar" {{ $assessment->training_status3 == 'scholar' ? 'selected' : '' }}>Scholar</option>
    <option value="non-scholar" {{ $assessment->training_status3 == 'non-scholar' ? 'selected' : '' }}>Non-Scholar</option>
    <option value="mix" {{ $assessment->training_status3 == 'mix' ? 'selected' : '' }}>Mix</option>
    </select>
        </div>
        
        <script>
    // Auto-show the sections based on selected training_status on page load
    document.addEventListener('DOMContentLoaded', function () {
        updateTrainingStatus3(); // Call function on page load
    });

    document.getElementById('training_status3').addEventListener('change', function () {
        updateTrainingStatus3(); // Call function on change
    });

    function updateTrainingStatus3() {
        var trainingStatus3 = document.getElementById('training_status3').value;
        var scholarshipDiv3 = document.getElementById('scholarship_div3');
        var nonScholarshipDiv3 = document.getElementById('non_scholarship_div3');
        var mix_no_container3 = document.getElementById('mix_no_container3');

        if (trainingStatus3 === 'scholar') {
            scholarshipDiv3.style.display = 'block';
            nonScholarshipDiv3.style.display = 'none';
            mix_no_container3.style.display = 'none';
        } else if (trainingStatus3 === 'non-scholar') {
            scholarshipDiv3.style.display = 'none';
            nonScholarshipDiv3.style.display = 'block';
            mix_no_container=3.style.display = 'none';
        } else if (trainingStatus3 === 'mix') {
            scholarshipDiv3.style.display = 'block';
            nonScholarshipDiv3.style.display = 'block';
            mix_no_container3.style.display = 'block';
        } else {
            // Hide all if no selection
            scholarshipDiv3.style.display = 'none';
            nonScholarshipDiv3.style.display = 'none';
            mix_no_container3.style.display = 'none';
        }
    }
</script>



<!-- Mix Number Container (For Scholar Mix) -->
<div id="mix_no_container3" style="display: {{ $assessment->training_status3 == 'mix' ? 'block' : 'none' }};">
    <label for="mix_no3" class="block text-sm font-medium mb-2">
        Number of Scholar:
    </label>
    <select id="mix_no3" name="mix_no3"
        class="w-full px-4 py-2 border rounded-lg focus:ring focus:ring-blue-300 bg-white dark:border-gray-600 dark:text-black">
        <option value="" disabled>Select your number of Scholar</option>
        @for ($i = 1; $i <= $assessment->no_of_pax3 - 1; $i++)
            <option value="{{ $i }}" {{ $assessment->mix_no3 == $i ? 'selected' : '' }}>{{ $i }}</option>
        @endfor
    </select>
</div>



      <!-- Scholar Section -->
<div id="scholarship_div3" style="display: {{ $assessment->training_status3 == 'scholar' || $assessment->training_status3 == 'mix' ? 'block' : 'none' }};">
    <label for="scholarship3" class="block text-sm font-medium mb-2">
        Scholarship Type:
    </label>
    <select id="scholarship3" name="type_of_scholar3"
        class="w-full px-4 py-2 border rounded-lg focus:ring focus:ring-blue-300 bg-white dark:border-gray-600 dark:text-black">
        <option value="" disabled>Select your scholarship type</option>
        <option value="ttsp" {{ $assessment->type_of_scholar3 == 'ttsp' ? 'selected' : '' }}>TTSP</option>
        <option value="cfsp" {{ $assessment->type_of_scholar3 == 'cfsp' ? 'selected' : '' }}>CFSP</option>
        <option value="uaqtea" {{ $assessment->type_of_scholar3 == 'uaqtea' ? 'selected' : '' }}>UAQTEA</option>
        <option value="twsp" {{ $assessment->type_of_scholar3 == 'twsp' ? 'selected' : '' }}>TWSP</option>
    </select>
</div>


<!-- Non-Scholar Section -->
<div id="non_scholarship_div3" style="display: {{ $assessment->training_status3 == 'non-scholar' || $assessment->training_status3 == 'mix' ? 'block' : 'none' }};">
    <label for="non_scholarship3" class="block text-sm font-medium mb-2">
        Non-Scholarship Type:
    </label>
    <select id="non_scholarship3" name="type_of_non_scholar3"
        class="w-full px-4 py-2 border rounded-lg focus:ring focus:ring-blue-300 bg-white dark:border-gray-600 dark:text-black">
        <option value="" disabled>Select your non-scholarship type</option>
        <option value="Walk-In" {{ $assessment->type_of_non_scholar3 == 'Walk-In' ? 'selected' : '' }}>Walk-In</option>
        <option value="CAWS" {{ $assessment->type_of_non_scholar3 == 'CAWS' ? 'selected' : '' }}>CAWS</option>
        <option value="Three" {{ $assessment->type_of_non_scholar3 == 'Three' ? 'selected' : '' }}>Three</option>
        <option value="Four" {{ $assessment->type_of_non_scholar3 == 'Four' ? 'selected' : '' }}>Four</option>
    </select>
</div>
    
@endif

@if(!empty($assessment->qualification4))
              
        <div>
            <label for="qualification4" class="block text-sm font-medium mb-2">
                Qualification:
            </label>
            <select id="qualification4" name="qualification4" 
                    class="w-full px-4 py-2 border rounded-lg focus:ring focus:ring-blue-300 bg-white dark:border-white-600 dark:text-black">
                    <option value="" disabled>Select your qualification</option>
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
                <option value="" disabled>Select your number of pax</option>
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
                    <option value="" disabled>Select your training status</option>
    <option value="scholar" {{ $assessment->training_status4 == 'scholar' ? 'selected' : '' }}>Scholar</option>
    <option value="non-scholar" {{ $assessment->training_status4 == 'non-scholar' ? 'selected' : '' }}>Non-Scholar</option>
    <option value="mix" {{ $assessment->training_status4 == 'mix' ? 'selected' : '' }}>Mix</option>
    </select>
        </div>
        
        <script>
    // Auto-show the sections based on selected training_status on page load
    document.addEventListener('DOMContentLoaded', function () {
        updateTrainingStatus4(); // Call function on page load
    });

    document.getElementById('training_status4').addEventListener('change', function () {
        updateTrainingStatus4(); // Call function on change
    });

    function updateTrainingStatus4() {
        var trainingStatus4 = document.getElementById('training_status4').value;
        var scholarshipDiv4 = document.getElementById('scholarship_div4');
        var nonScholarshipDiv4 = document.getElementById('non_scholarship_div4');
        var mix_no_container4 = document.getElementById('mix_no_container4');

        if (trainingStatus4 === 'scholar') {
            scholarshipDiv4.style.display = 'block';
            nonScholarshipDiv4.style.display = 'none';
            mix_no_container4.style.display = 'none';
        } else if (trainingStatus4 === 'non-scholar') {
            scholarshipDiv4.style.display = 'none';
            nonScholarshipDiv4.style.display = 'block';
            mix_no_container4.style.display = 'none';
        } else if (trainingStatus4 === 'mix') {
            scholarshipDiv4.style.display = 'block';
            nonScholarshipDiv4.style.display = 'block';
            mix_no_container4.style.display = 'block';
        } else {
            // Hide all if no selection
            scholarshipDiv4.style.display = 'none';
            nonScholarshipDiv4.style.display = 'none';
            mix_no_container4.style.display = 'none';
        }
    }
</script>

<!-- Mix Number Container (For Scholar Mix) -->
<div id="mix_no_container4" style="display: {{ $assessment->training_status4 == 'mix' ? 'block' : 'none' }};">
    <label for="mix_no4" class="block text-sm font-medium mb-2">
        Number of Scholar:
    </label>
    <select id="mix_no4" name="mix_no4"
        class="w-full px-4 py-2 border rounded-lg focus:ring focus:ring-blue-300 bg-white dark:border-gray-600 dark:text-black">
        <option value="" disabled>Select your number of Scholar</option>
        @for ($i = 1; $i <= $assessment->no_of_pax4 - 1; $i++)
            <option value="{{ $i }}" {{ $assessment->mix_no4 == $i ? 'selected' : '' }}>{{ $i }}</option>
        @endfor
    </select>
</div>



      <!-- Scholar Section -->
<div id="scholarship_div4" style="display: {{ $assessment->training_status4 == 'scholar' || $assessment->training_status4 == 'mix' ? 'block' : 'none' }};">
    <label for="scholarship4" class="block text-sm font-medium mb-2">
        Scholarship Type:
    </label>
    <select id="scholarship4" name="type_of_scholar4"
        class="w-full px-4 py-2 border rounded-lg focus:ring focus:ring-blue-300 bg-white dark:border-gray-600 dark:text-black">
        <option value="" disabled>Select your scholarship type</option>
        <option value="ttsp" {{ $assessment->type_of_scholar4 == 'ttsp' ? 'selected' : '' }}>TTSP</option>
        <option value="cfsp" {{ $assessment->type_of_scholar4 == 'cfsp' ? 'selected' : '' }}>CFSP</option>
        <option value="uaqtea" {{ $assessment->type_of_scholar4 == 'uaqtea' ? 'selected' : '' }}>UAQTEA</option>
        <option value="twsp" {{ $assessment->type_of_scholar4 == 'twsp' ? 'selected' : '' }}>TWSP</option>
    </select>
</div>


<!-- Non-Scholar Section -->
<div id="non_scholarship_div4" style="display: {{ $assessment->training_status4 == 'non-scholar' || $assessment->training_status4 == 'mix' ? 'block' : 'none' }};">
    <label for="non_scholarship4" class="block text-sm font-medium mb-2">
        Non-Scholarship Type:
    </label>
    <select id="non_scholarship4" name="type_of_non_scholar4"
        class="w-full px-4 py-2 border rounded-lg focus:ring focus:ring-blue-300 bg-white dark:border-gray-600 dark:text-black">
        <option value="" disabled>Select your non-scholarship type</option>
        <option value="Walk-In" {{ $assessment->type_of_non_scholar4 == 'Walk-In' ? 'selected' : '' }}>Walk-In</option>
        <option value="CAWS" {{ $assessment->type_of_non_scholar4 == 'CAWS' ? 'selected' : '' }}>CAWS</option>
        <option value="Three" {{ $assessment->type_of_non_scholar4 == 'Three' ? 'selected' : '' }}>Three</option>
        <option value="Four" {{ $assessment->type_of_non_scholar4 == 'Four' ? 'selected' : '' }}>Four</option>
    </select>
</div>

@endif

<div>
    <label for="agreement" class="flex items-center space-x-2">
        <input type="checkbox" id="agreement" class="rounded border-gray-300 text-blue-600 focus:ring-blue-500" />
        <span>I agree the updates.</span>
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
    Apply Update
</button>



            </div>
 <!-- Step 2: Document Upload -->
    <div id="step2" style="display: none;">
        
      <!-- Document Title -->
      <div id="qualificationTitle" class="mt-4">
            <h2>Please upload your document here ({{$assessment->qualification}})</h2>
        </div>
     
<!-- Endorsement Letter To TESDA -->
<div class="mt-4">
    <div style="display: flex; align-items: center; gap: 20px;">
        <!-- Left Side: File Input -->
        <!-- Endorsement Letter To TESDA -->
        <div style="flex: 1;">
    
        <x-input-label class="text-black" for="elttDocument" :value="__('Endorsement Letter To TESDA')" />
            <x-text-input id="elttDocument" class="block w-full bg-white dark:text-black" type="file" name="eltt"
                autocomplete="eltt" onchange="previewDocument(event, 'pdf', 'pdfView')" required/>
                     <!-- Show existing file name if available -->
            @if(!empty($assessment->eltt))
                <p class="text-sm text-gray-500 mt-1">Current File: <a href="{{ asset('/' . $assessment->eltt) }}" target="_blank" class="text-blue-500 underline">{{ basename($assessment->eltt) }}</a></p>
            @endif
            <x-input-error :messages="$errors->get('eltt')" class="mt-2" />

            <x-input-label class="text-black" for="rfftpDocument" :value="__('Request Form For Test Package')" />
    <x-text-input id="rfftpDocument" class="block mt-1 w-full bg-white dark:text-black" type="file" name="rfftp"
    autocomplete="rfftp" onchange="previewDocument(event, 'pdf', 'pdfView')" required/>
    @if(!empty($assessment->rfftp))
                <p class="text-sm text-gray-500 mt-1">Current File: <a href="{{ asset('/' . $assessment->rfftp) }}" target="_blank" class="text-blue-500 underline">{{ basename($assessment->rfftp) }}</a></p>
            @endif
    <x-input-error :messages="$errors->get('rfftp')" class="mt-2" />

    <div id="oropfafnsContainer" style="display: none;">
    <x-input-label for="oropfafnsDocument" :value="__('Official Receipt of Payment for Assessment for Non-Scholar')" />
    <x-text-input id="oropfafnsDocument" class="block mt-1 w-full bg-white dark:text-black" type="file" name="oropfafns"
        autocomplete="oropfafns" onchange="previewDocument(event, 'pdf', 'pdfView')" />

     
    <p class="text-sm text-gray-500 mt-1">
        Current File: 
        @if (!empty($assessment->oropfafns) && file_exists(public_path($assessment->oropfafns)) && $assessment->training_status !== 'scholar')
        <a href="{{ asset('/' . $assessment->oropfafns) }}" target="_blank" class="text-blue-500 underline">
            {{ basename($assessment->oropfafns) }}
        </a>
        @endif
    </p>


    <x-input-error :messages="$errors->get('oropfafns')" class="mt-2" />
</div>


    <script>
    document.addEventListener('DOMContentLoaded', function () {
        const trainingStatus = document.getElementById('training_status');
        const oropfafnsContainer = document.getElementById('oropfafnsContainer');

        function toggleOropfafns() {
            if (trainingStatus.value === 'mix' || trainingStatus.value === 'non-scholar') {
                oropfafnsContainer.style.display = 'block';
            } else {
                oropfafnsContainer.style.display = 'none';
            }
        }

        // Trigger on page load
        toggleOropfafns();

        // Add event listener for dropdown change
        trainingStatus.addEventListener('change', toggleOropfafns);
    });
</script>

    <x-input-label class="text-black" for="sopcctvrDocument" :value="__('Submission of Previous CCTV Recordings')" />
    <x-text-input id="sopcctvrDocument" class="block mt-1 w-full bg-white dark:text-black" type="file" name="sopcctvr"
    autocomplete="sopcctvr" onchange="previewDocument(event, 'pdf', 'pdfView')" required/>
   @if (!empty($assessment->oropfafns2) && file_exists(public_path($assessment->oropfafns2)) && $assessment->training_status2 !== 'scholar')
    <p class="text-sm text-gray-500 mt-1">
        Current File: 
        <a href="{{ asset('/' . $assessment->oropfafns2) }}" target="_blank" class="text-blue-500 underline">
            {{ basename($assessment->oropfafns2) }}
        </a>
    </p>
@endif
    <x-input-error :messages="$errors->get('sopcctvr')" class="mt-2" />

        </div>
        <!-- Right Side: PDF Preview -->
        <div id="pdf" style="flex: 2;">
            <iframe id="pdfView" src="{{ asset('/' . $assessment->eltt) }}" style="width: 300px; height: 300px; border: 1px solid #ccc;"></iframe>
        </div>
    </div>
</div>


@if(!empty($assessment->qualification2))

   <!-- Document Title -->
   <div id="qualificationTitle2" class="mt-4">
            <h2>Please upload your document here ({{$assessment->qualification2}})</h2>
        </div>

<!-- Endorsement Letter To TESDA -->
<div class="mt-4">
    <div style="display: flex; align-items: center; gap: 20px;">
        <!-- Left Side: File Input -->
        <div style="flex: 1;">
    
        <x-input-label class="text-black" for="elttDocument2" :value="__('Endorsement Letter To TESDA')" />
            <x-text-input id="elttDocument2" class="block w-full bg-white dark:text-black" type="file" name="eltt2" 
                autocomplete="eltt2" onchange="previewDocument(event, 'pdf2', 'pdfView2')"/>
                @if(!empty($assessment->eltt2))
                <p class="text-sm text-gray-500 mt-1">Current File: <a href="{{ asset('/' . $assessment->eltt2) }}" target="_blank" class="text-blue-500 underline">{{ basename($assessment->eltt2) }}</a></p>
            @endif
            <x-input-error :messages="$errors->get('eltt2')" class="mt-2" />

            <x-input-label class="text-black" for="rfftpDocument2" :value="__('Request Form For Test Package')" />
    <x-text-input id="rfftpDocument2" class="block mt-1 w-full bg-white dark:text-black" type="file" name="rfftp2" 
    autocomplete="rfftp2" onchange="previewDocument(event, 'pdf2', 'pdfView2')"/>
    @if(!empty($assessment->rfftp2))
                <p class="text-sm text-gray-500 mt-1">Current File: <a href="{{ asset('/' . $assessment->rfftp2) }}" target="_blank" class="text-blue-500 underline">{{ basename($assessment->rfftp2) }}</a></p>
            @endif
    <x-input-error :messages="$errors->get('rfftp2')" class="mt-2" />

    <div id="oropfafnsContainer2" style="display: none;">
    <x-input-label for="oropfafnsDocument2" :value="__('Official Receipt of Payment for Assessment for Non-Scholar')" />
    <x-text-input id="oropfafnsDocument2" class="block mt-1 w-full bg-white dark:text-black" type="file" name="oropfafns2"
        autocomplete="oropfafns2" onchange="previewDocument(event, 'pdf2', 'pdfView2')" />
    
      
    <p class="text-sm text-gray-500 mt-1">
        Current File: 
        @if (!empty($assessment->oropfafns2) && file_exists(public_path($assessment->oropfafns2)) && $assessment->training_status2 !== 'scholar')
        <a href="{{ asset('/' . $assessment->oropfafns2) }}" target="_blank" class="text-blue-500 underline">
            {{ basename($assessment->oropfafns2) }}
        </a>
        @endif
    </p>

    <x-input-error :messages="$errors->get('oropfafns2')" class="mt-2" />
</div>

<!-- Corrected JavaScript -->
<script>
    document.addEventListener('DOMContentLoaded', function () {
        const trainingStatus2 = document.getElementById('training_status2');
        const oropfafnsContainer2 = document.getElementById('oropfafnsContainer2');
        const oropfafnsInput2 = document.getElementById('oropfafnsDocument2');

        function toggleOropfafns2() {
            if (trainingStatus2.value === 'mix' || trainingStatus2.value === 'non-scholar') {
                oropfafnsContainer2.style.display = 'block';
            } else {
                oropfafnsContainer2.style.display = 'none';
                // Clear file input if "scholar" is selected
                if (trainingStatus2.value === 'scholar') {
                    oropfafnsInput2.value = ''; // Clear the file input
                }
            }
        }

        // Trigger on page load
        toggleOropfafns2();

        // Add event listener for dropdown change
        trainingStatus2.addEventListener('change', toggleOropfafns2);
    });
</script>





    <x-input-label class="text-black" for="sopcctvrDocument2" :value="__('Submission of Previous CCTV Recordings')" />
    <x-text-input id="sopcctvrDocument2" class="block mt-1 w-full bg-white dark:text-black" type="file" name="sopcctvr2" 
    autocomplete="sopcctvr2" onchange="previewDocument(event, 'pdf2', 'pdfView2')"/>
    @if(!empty($assessment->sopcctvr2))
                <p class="text-sm text-gray-500 mt-1">Current File: <a href="{{ asset('/' . $assessment->sopcctvr2) }}" target="_blank" class="text-blue-500 underline">{{ basename($assessment->sopcctvr2) }}</a></p>
            @endif
    <x-input-error :messages="$errors->get('sopcctvr2')" class="mt-2" />

        </div>
        <!-- Right Side: PDF Preview -->
        <div id="pdf2" style="flex: 2;">
            <iframe id="pdfView2" src="{{ asset('/' . $assessment->eltt2) }}" style="width: 300px; height: 300px; border: 1px solid #ccc; background-color:blue"></iframe>
        </div>
    </div>
</div>

@endif


@if(!empty($assessment->qualification3))

   <!-- Document Title -->
   <div id="qualificationTitle3" class="mt-4">
            <h2>Please upload your document here ({{$assessment->qualification3}})</h2>
        </div>

<!-- Endorsement Letter To TESDA -->
<div class="mt-4">
    <div style="display: flex; align-items: center; gap: 20px;">
        <!-- Left Side: File Input -->
        <div style="flex: 1;">
    
        <x-input-label class="text-black" for="elttDocument3" :value="__('Endorsement Letter To TESDA')" />
            <x-text-input id="elttDocument3" class="block w-full bg-white dark:text-black" type="file" name="eltt3" 
                autocomplete="eltt3" onchange="previewDocument(event, 'pdf3', 'pdfView3')"/>
                @if(!empty($assessment->eltt3))
                <p class="text-sm text-gray-500 mt-1">Current File: <a href="{{ asset('/' . $assessment->eltt3) }}" target="_blank" class="text-blue-500 underline">{{ basename($assessment->eltt3) }}</a></p>
            @endif
            <x-input-error :messages="$errors->get('eltt3')" class="mt-2" />

            <x-input-label class="text-black" for="rfftpDocument3" :value="__('Request Form For Test Package')" />
    <x-text-input id="rfftpDocument3" class="block mt-1 w-full bg-white dark:text-black" type="file" name="rfftp3" 
     autocomplete="rfftp3" onchange="previewDocument(event, 'pdf3', 'pdfView3')"/>
        @if(!empty($assessment->rfftp3))
                    <p class="text-sm text-gray-500 mt-1">Current File: <a href="{{ asset('/' . $assessment->rfftp3) }}" target="_blank" class="text-blue-500 underline">{{ basename($assessment->rfftp3) }}</a></p>
                @endif
    <x-input-error :messages="$errors->get('rfftp3')" class="mt-2" />

    <div id="oropfafnsContainer3" style="display: none;">
    <x-input-label for="oropfafnsDocument3" :value="__('Official Receipt of Payment for Assessment for Non-Scholar')" />
    <x-text-input id="oropfafnsDocument3" class="block mt-1 w-full bg-white dark:text-black" type="file" name="oropfafns3"
        autocomplete="oropfafns3" onchange="previewDocument(event, 'pdf3', 'pdfView3')" />
    
   
    <p class="text-sm text-gray-500 mt-1">
        Current File: 
        @if (!empty($assessment->oropfafns3) && file_exists(public_path($assessment->oropfafns3)) && $assessment->training_status3 !== 'scholar')
        <a href="{{ asset('/' . $assessment->oropfafns3) }}" target="_blank" class="text-blue-500 underline">
            {{ basename($assessment->oropfafns3) }}
        </a>
        @endif
    </p>

    <x-input-error :messages="$errors->get('oropfafns3')" class="mt-2" />
</div>

<!-- Corrected JavaScript -->
<script>
    document.addEventListener('DOMContentLoaded', function () {
        const trainingStatus3 = document.getElementById('training_status3');
        const oropfafnsContainer3 = document.getElementById('oropfafnsContainer3');
        const oropfafnsInput3 = document.getElementById('oropfafnsDocument3');

        function toggleOropfafns3() {
            if (trainingStatus3.value === 'mix' || trainingStatus3.value === 'non-scholar') {
                oropfafnsContainer3.style.display = 'block';
            } else {
                oropfafnsContainer3.style.display = 'none';
                // Clear file input if "scholar" is selected
                if (trainingStatus3.value === 'scholar') {
                    oropfafnsInput3.value = ''; // Clear the file input
                }
            }
        }

        // Trigger on page load
        toggleOropfafns3();

        // Add event listener for dropdown change
        trainingStatus3.addEventListener('change', toggleOropfafns3);
    });
</script>


    <x-input-label class="text-black" for="sopcctvrDocument3" :value="__('Submission of Previous CCTV Recordings')" />
    <x-text-input id="sopcctvrDocument3" class="block mt-1 w-full bg-white dark:text-black" type="file" name="sopcctvr3"
     autocomplete="sopcctvr3" onchange="previewDocument(event, 'pdf3', 'pdfView3')"/>
        @if(!empty($assessment->sopcctvr3))
                    <p class="text-sm text-gray-500 mt-1">Current File: <a href="{{ asset('/' . $assessment->sopcctvr3) }}" target="_blank" class="text-blue-500 underline">{{ basename($assessment->sopcctvr3) }}</a></p>
                @endif
    <x-input-error :messages="$errors->get('sopcctvr3')" class="mt-2" />

        </div>
        <!-- Right Side: PDF Preview -->
        <div id="pdf3" style="flex: 2;">
            <iframe id="pdfView3" src="{{ asset('/' . $assessment->eltt3) }}" style="width: 300px; height: 300px; border: 1px solid #ccc;"></iframe>
        </div>
    </div>
</div>

@endif


@if(!empty($assessment->qualification4))

   <!-- Document Title -->
   <div id="qualificationTitle4" class="mt-4">
            <h2>Please upload your document here ({{$assessment->qualification4}})</h2>
        </div>

<!-- Endorsement Letter To TESDA -->
<div class="mt-4">
    <div style="display: flex; align-items: center; gap: 20px;">
        <!-- Left Side: File Input -->
        <div style="flex: 1;">
    
        <x-input-label class="text-black" for="elttDocument4" :value="__('Endorsement Letter To TESDA')" />
            <x-text-input id="elttDocument4" class="block w-full bg-white dark:text-black" type="file" name="eltt4" 
                autocomplete="eltt4" onchange="previewDocument(event, 'pdf4', 'pdfView4')"/>
                @if(!empty($assessment->eltt4))
                <p class="text-sm text-gray-500 mt-1">Current File: <a href="{{ asset('/' . $assessment->eltt4) }}" target="_blank" class="text-blue-500 underline">{{ basename($assessment->eltt4) }}</a></p>
            @endif
            <x-input-error :messages="$errors->get('eltt4')" class="mt-2" />

            <x-input-label class="text-black" for="rfftpDocument4" :value="__('Request Form For Test Package')" />
    <x-text-input id="rfftpDocument4" class="block mt-1 w-full bg-white dark:text-black" type="file" name="rfftp4"
     autocomplete="rfftp4" onchange="previewDocument(event, 'pdf4', 'pdfView4')"/>
        @if(!empty($assessment->rfftp4))
                    <p class="text-sm text-gray-500 mt-1">Current File: <a href="{{ asset('/' . $assessment->rfftp4) }}" target="_blank" class="text-blue-500 underline">{{ basename($assessment->rfftp4) }}</a></p>
                @endif
    <x-input-error :messages="$errors->get('rfftp4')" class="mt-2" />

    <div id="oropfafnsContainer4" style="display: none;">
    <x-input-label for="oropfafnsDocument4" :value="__('Official Receipt of Payment for Assessment for Non-Scholar')" />
    <x-text-input id="oropfafnsDocument4" class="block mt-1 w-full bg-white dark:text-black" type="file" name="oropfafns4"
        autocomplete="oropfafns4" onchange="previewDocument(event, 'pdf4', 'pdfView4')" />
    
       
    <p class="text-sm text-gray-500 mt-1">
        Current File: 
        @if (!empty($assessment->oropfafns4) && file_exists(public_path($assessment->oropfafns4)) && $assessment->training_status4 !== 'scholar')
        <a href="{{ asset('/' . $assessment->oropfafns4) }}" target="_blank" class="text-blue-500 underline">
            {{ basename($assessment->oropfafns4) }}
        </a>
        @endif
    </p>

    <x-input-error :messages="$errors->get('oropfafns4')" class="mt-2" />
</div>

<!-- Corrected JavaScript -->
<script>
    document.addEventListener('DOMContentLoaded', function () {
        const trainingStatus4 = document.getElementById('training_status4');
        const oropfafnsContainer4 = document.getElementById('oropfafnsContainer4');
        const oropfafnsInput4 = document.getElementById('oropfafnsDocument4');

        function toggleOropfafns4() {
            if (trainingStatus4.value === 'mix' || trainingStatus4.value === 'non-scholar') {
                oropfafnsContainer4.style.display = 'block';
            } else {
                oropfafnsContainer4.style.display = 'none';
                // Clear file input if "scholar" is selected
                if (trainingStatus4.value === 'scholar') {
                    oropfafnsInput4.value = ''; // Clear the file input
                }
            }
        }

        // Trigger on page load
        toggleOropfafns4();

        // Add event listener for dropdown change
        trainingStatus4.addEventListener('change', toggleOropfafns4);
    });
</script>

    <x-input-label class="text-black" for="sopcctvrDocument4" :value="__('Submission of Previous CCTV Recordings')" />
    <x-text-input id="sopcctvrDocument4" class="block mt-1 w-full bg-white dark:text-black" type="file" name="sopcctvr4" 
    autocomplete="sopcctvr4" onchange="previewDocument(event, 'pdf4', 'pdfView4')"/>
        @if(!empty($assessment->sopcctvr4))
                    <p class="text-sm text-gray-500 mt-1">Current File: <a href="{{ asset('/' . $assessment->sopcctvr4) }}" target="_blank" class="text-blue-500 underline">{{ basename($assessment->sopcctvr4) }}</a></p>
                @endif
    <x-input-error :messages="$errors->get('sopcctvr4')" class="mt-2" />

        </div>
        <!-- Right Side: PDF Preview -->
        <div id="pdf4" style="flex: 2;">
            <iframe id="pdfView4" src="{{ asset('/' . $assessment->eltt4) }}" style="width: 300px; height: 300px; border: 1px solid #ccc;"></iframe>
        </div>
    </div>
</div>


@endif

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
    // Hide Step 1 and Show Step 2
    document.getElementById('step1').style.display = 'none';
    document.getElementById('step2').style.display = 'block';
});
                            </script>

</div>
</x-app-layout> 