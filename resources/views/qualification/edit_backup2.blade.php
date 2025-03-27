
<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/flatpickr/dist/flatpickr.min.css">

<form action="{{ route('assessments.oneUpdate', $assessment->id) }}" method="POST" class="space-y-6" enctype="multipart/form-data">
    @csrf
    @method('PUT')

<div id="Editstep1">

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
 value="{{  $assessment->assessment_date }}"
placeholder="Select Date"
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
    document.addEventListener('DOMContentLoaded', function () {
        const noOfPaxSelect = document.getElementById('no_of_pax');
        const mixNoSelect = document.getElementById('mix_no');
        const selectedMixNo = "{{ $assessment->mix_no ?? '' }}"; // Retrieve previously selected mix_no

        // Function to populate mix_no options
        function populateMixNoOptions(selectedValue) {

            if (selectedValue > 1) {
                for (let i = selectedValue - 1; i >= 1; i--) {
                    let option = document.createElement('option');
                    option.value = i;
                    option.textContent = i;

                    // Mark previously selected value as selected
                    if (selectedMixNo == i) {
                        option.selected = true;
                    }

                    mixNoSelect.appendChild(option);
                }
            }
        }

        // Populate mix_no on page load if no_of_pax has a selected value
        if (noOfPaxSelect.value) {
            populateMixNoOptions(parseInt(noOfPaxSelect.value));
        }

        // Handle change event for no_of_pax dropdown
        noOfPaxSelect.addEventListener('change', function () {
            let selectedValue = parseInt(this.value);
            populateMixNoOptions(selectedValue);
        });
    });
</script>

@if(!empty($assessment->training_status === 'mix'))
<div id="mix_no_container">
<label for="mix_no" class="block text-sm font-medium mb-2">
Number of Scholar:
</label>
<select id="mix_no" name="mix_no" 
class="w-full px-4 py-2 border rounded-lg focus:ring focus:ring-blue-300 bg-white dark:border-gray-600 dark:text-black">
</select>
</div>
@endif

@if($assessment->training_status === 'mix' || $assessment->training_status === 'scholar')
<!-- Scholar Section -->
<div id="scholarship_div">
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
@endif

@if($assessment->training_status === 'mix' || $assessment->training_status === 'non_scholar')
<!-- Non-Scholar Section -->
<div id="non_scholarship_div">
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
@endif



@if(!empty($assessment->qualification2))
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


<script>
    document.addEventListener('DOMContentLoaded', function () {
        const noOfPaxSelect = document.getElementById('no_of_pax2');
        const mixNoSelect = document.getElementById('mix_no2');
        const selectedMixNo = "{{ $assessment->mix_no2 ?? '' }}"; // Retrieve previously selected mix_no

        // Function to populate mix_no options
        function populateMixNoOptions(selectedValue) {

            if (selectedValue > 1) {
                for (let i = selectedValue - 1; i >= 1; i--) {
                    let option = document.createElement('option');
                    option.value = i;
                    option.textContent = i;

                    // Mark previously selected value as selected
                    if (selectedMixNo == i) {
                        option.selected = true;
                    }

                    mixNoSelect.appendChild(option);
                }
            }
        }

        // Populate mix_no on page load if no_of_pax has a selected value
        if (noOfPaxSelect.value) {
            populateMixNoOptions(parseInt(noOfPaxSelect.value));
        }

        // Handle change event for no_of_pax dropdown
        noOfPaxSelect.addEventListener('change', function () {
            let selectedValue = parseInt(this.value);
            populateMixNoOptions(selectedValue);
        });
    });
</script>

@if(!empty($assessment->training_status2 === 'mix'))
<div id="mix_no_container2">
<label for="mix_no2" class="block text-sm font-medium mb-2">
Number of Scholar:
</label>
<select id="mix_no2" name="mix_no2" 
class="w-full px-4 py-2 border rounded-lg focus:ring focus:ring-blue-300 bg-white dark:border-gray-600 dark:text-black">

</select>
</div>
@endif



@if($assessment->training_status2 === 'mix' || $assessment->training_status2 === 'scholar')
<div id="scholarship_div2">
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
@endif

@if($assessment->training_status2 === 'mix' || $assessment->training_status2 === 'non_scholar')
<div id="non_scholarship_div2">
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
@endif

@endif

@if(!empty($assessment->qualification3))

<div>
<label for="qualification3" class="block text-sm font-medium mb-2">
Qualification:
</label>
<select id="qualification3" name="qualification3" 
class="w-full px-4 py-2 border rounded-lg focus:ring focus:ring-blue-300 bg-white dark:border-white-600 dark:text-black">
<option value="FBS NC II" {{ $assessment->qualification2 == 'FBS NC II' ? 'selected' : '' }}>FBS NC II</option>
        <option value="CSS NC II" {{ $assessment->qualification2 == 'CSS NC II' ? 'selected' : '' }}>CSS NC II</option>
        <option value="Cook NC II" {{ $assessment->qualification2 == 'Cook NC II' ? 'selected' : '' }}>Cook NC II</option>
        <option value="Driving NC II" {{ $assessment->qualification2 == 'Driving NC II' ? 'selected' : '' }}>Driving NC II</option>
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
    document.addEventListener('DOMContentLoaded', function () {
        const noOfPaxSelect = document.getElementById('no_of_pax3');
        const mixNoSelect = document.getElementById('mix_no3');
        const selectedMixNo = "{{ $assessment->mix_no3 ?? '' }}"; // Retrieve previously selected mix_no

        // Function to populate mix_no options
        function populateMixNoOptions(selectedValue) {

            if (selectedValue > 1) {
                for (let i = selectedValue - 1; i >= 1; i--) {
                    let option = document.createElement('option');
                    option.value = i;
                    option.textContent = i;

                    // Mark previously selected value as selected
                    if (selectedMixNo == i) {
                        option.selected = true;
                    }

                    mixNoSelect.appendChild(option);
                }
            }
        }

        // Populate mix_no on page load if no_of_pax has a selected value
        if (noOfPaxSelect.value) {
            populateMixNoOptions(parseInt(noOfPaxSelect.value));
        }

        // Handle change event for no_of_pax dropdown
        noOfPaxSelect.addEventListener('change', function () {
            let selectedValue = parseInt(this.value);
            populateMixNoOptions(selectedValue);
        });
    });
</script>

@if(!empty($assessment->training_status3 === 'mix'))

<div id="mix_no_container2">
<label for="mix_no3" class="block text-sm font-medium mb-2">
Number of Scholar:
</label>
<select id="mix_no3" name="mix_no3" 
class="w-full px-4 py-2 border rounded-lg focus:ring focus:ring-blue-300 bg-white dark:border-gray-600 dark:text-black">
</select>
</div>
@endif

@if($assessment->training_status3 === 'mix' || $assessment->training_status3 === 'scholar')
<div id="scholarship_div3">
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
@endif

@if($assessment->training_status3 === 'mix' || $assessment->training_status3 === 'non_scholar')
<div id="non_scholarship_div3">
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
@endif

@endif

@if(!empty($assessment->qualification4))
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
    document.addEventListener('DOMContentLoaded', function () {
        const noOfPaxSelect = document.getElementById('no_of_pax4');
        const mixNoSelect = document.getElementById('mix_no4');
        const selectedMixNo = "{{ $assessment->mix_no4 ?? '' }}"; // Retrieve previously selected mix_no

        // Function to populate mix_no options
        function populateMixNoOptions(selectedValue) {

            if (selectedValue > 1) {
                for (let i = selectedValue - 1; i >= 1; i--) {
                    let option = document.createElement('option');
                    option.value = i;
                    option.textContent = i;

                    // Mark previously selected value as selected
                    if (selectedMixNo == i) {
                        option.selected = true;
                    }

                    mixNoSelect.appendChild(option);
                }
            }
        }

        // Populate mix_no on page load if no_of_pax has a selected value
        if (noOfPaxSelect.value) {
            populateMixNoOptions(parseInt(noOfPaxSelect.value));
        }

        // Handle change event for no_of_pax dropdown
        noOfPaxSelect.addEventListener('change', function () {
            let selectedValue = parseInt(this.value);
            populateMixNoOptions(selectedValue);
        });
    });
</script>

@if(!empty($assessment->training_status4 === 'mix'))
<div id="mix_no_container2">
<label for="mix_no4" class="block text-sm font-medium mb-2">
Number of Scholar:
</label>
<select id="mix_no4" name="mix_no4" 
class="w-full px-4 py-2 border rounded-lg focus:ring focus:ring-blue-300 bg-white dark:border-gray-600 dark:text-black">
</select>
</div>
@endif

@if($assessment->training_status4 === 'mix' || $assessment->training_status4 === 'scholar')
<div id="scholarship_div4">
<label for="scholarship4" class="block text-sm font-medium mb-2">
Scholarship Type:
</label>
<select id="non_scholarship4" name="type_of_scholar4" 
class="w-full px-4 py-2 border rounded-lg focus:ring focus:ring-blue-300 bg-white dark:border-gray-600 dark:text-black">
<option value="ttsp"  {{ $assessment->type_of_scholar4 == 'ttsp' ? 'selected' : '' }}>TTSP</option>
        <option value="cfsp"  {{ $assessment->type_of_scholar4 == 'cfsp' ? 'selected' : '' }}>CFSP</option>
        <option value="uaqtea"  {{ $assessment->type_of_scholar4 == 'uaqtea' ? 'selected' : '' }}>UAQTEA</option>
        <option value="twsp"  {{ $assessment->type_of_scholar4 == 'twsp' ? 'selected' : '' }}>TWSP</option>
</select>
</div>
@endif

@if($assessment->training_status4 === 'mix' || $assessment->training_status4 === 'non_scholar')
<div id="non_scholarship_div4">
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
@endif

@endif

<!-- Back Button (Hidden by Default) -->



<div>
<label for="agreementEdit" class="flex items-center space-x-2">
<input type="checkbox" id="agreementEdit" class="rounded border-gray-300 text-blue-600 focus:ring-blue-500" />
<span>I agree to the terms and conditions.</span>
</label>
</div>

<script>
document.getElementById('agreementEdit').addEventListener('change', function () {
const nextButton = document.getElementById('next_button_edit');
nextButton.disabled = !this.checked; // Enable if checked, disable otherwise
});
</script>


<button type="button" id="next_button_edit" 
class="mt-4 px-4 py-2 bg-blue-900 text-white rounded-lg hover:bg-blue-600 disabled:opacity-50" 
disabled>
Apply Schedule
</button>

</div>
<!-- Step 2: Document Upload -->
<div id="Editstep2" style="display: none;">


<!-- Document Title -->
<div id="qualificationTitle2" class="mt-4">
<h2>Provide PDF for {{$assessment->qualification}}</h2>
</div>

<!-- Endorsement Letter To TESDA -->
<div class="mt-4">
<div style="display: flex; align-items: center; gap: 20px;">
<!-- Left Side: File Input -->
<div style="flex: 1;">

<x-input-label class="text-white" for="elttDocument" :value="__('Endorsement Letter To TESDA')" />
<!-- Hidden File Input -->
<x-text-input id="EditelttDocument" class="hidden" type="file" name="eltt"
    onchange="previewEditDocument(event, 'Editpdf', 'EditpdfView')"  />
<!-- Read-Only Input to Show File Name -->
<x-text-input id="EditelttFileName" class="block w-full bg-white dark:text-black cursor-pointer" type="text"
    value="{{ $assessment->eltt }}" readonly onclick="document.getElementById('EditelttDocument').click()" />
<x-input-error :messages="$errors->get('eltt')" class="mt-2" />


<x-input-label class="text-white" for="rfftpDocument" :value="__('Request Form For Test Package')" />
<x-text-input id="EditrfftpDocument" class="hidden" type="file" name="rfftp" 
onchange="previewEditDocument(event, 'Editpdf', 'EditpdfView')"  />
<x-text-input id="EditrfftpDocument" class="block w-full bg-white dark:text-black cursor-pointer" type="text"
    value="{{ $assessment->rfftp }}" readonly onclick="document.getElementById('EditrfftpDocument').click()" />
<x-input-error :messages="$errors->get('rfftp')" class="mt-2" />

@if($assessment->training_status === 'mix' || $assessment->training_status === 'non_scholar')
<x-input-label for="oropfafnsDocument" :value="__('Official Receipt of Payment for Assessment for Non-Scholar')" />
<x-text-input id="EditoropfafnsDocument" class="hidden" type="file" name="oropfafns" 
onchange="previewEditDocument(event, 'Editpdf', 'EditpdfView')" />
<x-text-input id="EditoropfafnsDocument" class="block w-full bg-white dark:text-black cursor-pointer" type="text"
    value="{{ $assessment->oropfafns }}" readonly onclick="document.getElementById('EditoropfafnsDocument').click()" />
<x-input-error :messages="$errors->get('oropfafns')" class="mt-2" />
@endif


<x-input-label class="text-white" for="sopcctvrDocument" :value="__('Submission of Previous CCTV Recordings')" />
<x-text-input id="EditsopcctvrDocument" class="hidden" type="file" name="sopcctvr" 
onchange="previewEditDocument(event, 'Editpdf', 'EditpdfView')"  />
<x-text-input id="EditsopcctvrDocument" class="block w-full bg-white dark:text-black cursor-pointer" type="text"
    value="{{ $assessment->sopcctvr }}" readonly onclick="document.getElementById('EditsopcctvrDocument').click()" />
<x-input-error :messages="$errors->get('sopcctvr')" class="mt-2" />


</div>
<!-- Right Side: PDF Preview -->
<div id="Editpdf" style="display: none; flex: 2;">
    <iframe id="EditpdfView"  src="{{ $assessment->eltt }}"   style="width: 300px; height: 300px; border: 1px solid #ccc;"></iframe>
</div>
</div>
</div>




@if(!empty($assessment->qualification2))
<!-- Document Title -->
<div id="qualificationTitle2" class="mt-4">
<h2>Provide PDF for {{$assessment->qualification2}}</h2>
</div>


<!-- Endorsement Letter To TESDA -->
<div class="mt-4">
<div style="display: flex; align-items: center; gap: 20px;">
<!-- Left Side: File Input -->
<div style="flex: 1;">

<x-input-label class="text-white" for="elttDocument2" :value="__('Endorsement Letter To TESDA')" />
<x-text-input id="EditelttDocument2" class="hidden" type="file" name="eltt2" 
autocomplete="eltt2" onchange="previewEditDocument(event, 'Editpdf2', 'EditpdfView2')"/>
<x-text-input id="EditelttDocument2" class="block w-full bg-white dark:text-black cursor-pointer" type="text"
    value="{{ $assessment->eltt2 }}" readonly onclick="document.getElementById('EditelttDocument2').click()" />
<x-input-error :messages="$errors->get('eltt2')" class="mt-2" />

<x-input-label class="text-white" for="rfftpDocument2" :value="__('Request Form For Test Package')" />
<x-text-input id="EditrfftpDocument2" class="hidden" type="file" name="rfftp2"/>
<x-text-input id="EditrfftpDocument2" class="block w-full bg-white dark:text-black cursor-pointer" type="text"
    value="{{ $assessment->rfftp2 }}" readonly onclick="document.getElementById('EditrfftpDocument2').click()" />
<x-input-error :messages="$errors->get('rfftp2')" class="mt-2" />

@if($assessment->training_status2 === 'mix' || $assessment->training_status2 === 'non_scholar')
<x-input-label for="oropfafnsDocument2" :value="__('Official Receipt of Payment for Assessment for Non-Scholar')" />
<x-text-input id="EditoropfafnsDocument2" class="hidden" type="file" name="oropfafns2"/>
<x-text-input id="EditoropfafnsDocument2" class="block w-full bg-white dark:text-black cursor-pointer" type="text"
    value="{{ $assessment->oropfafns2 }}" readonly onclick="document.getElementById('EditoropfafnsDocument2').click()" />
<x-input-error :messages="$errors->get('oropfafns2')" class="mt-2" />
@endif

<x-input-label class="text-white" for="sopcctvrDocument2" :value="__('Submission of Previous CCTV Recordings')" />
<x-text-input id="EditsopcctvrDocument2" class="hidden" type="file" name="sopcctvr2"/>
<x-text-input id="EditsopcctvrDocument2" class="block w-full bg-white dark:text-black cursor-pointer" type="text"
    value="{{ $assessment->sopcctvr2 }}" readonly onclick="document.getElementById('EditsopcctvrDocument2').click()" />
<x-input-error :messages="$errors->get('sopcctvr2')" class="mt-2" />

</div>
<!-- Right Side: PDF Preview -->
<div id="Editpdf2" style="display: none; flex: 2;">
<iframe id="EditpdfView2" src="{{ $assessment->eltt2 }}" style="width: 300px; height: 300px; border: 1px solid #ccc; background-color:blue"></iframe>
</div>
</div>
</div>
@endif


@if(!empty($assessment->qualification3))

<!-- Document Title -->
<div id="qualificationTitle3" class="mt-4">
<h2>Provide PDF for {{$assessment->qualification3}}</h2>
</div>

<!-- Endorsement Letter To TESDA -->
<div class="mt-4">
<div style="display: flex; align-items: center; gap: 20px;">
<!-- Left Side: File Input -->
<div style="flex: 1;">

<x-input-label class="text-white" for="elttDocument3" :value="__('Endorsement Letter To TESDA')" />
<x-text-input id="EditelttDocument3" class="hidden" type="file" name="eltt3"/>
<x-text-input id="EditelttDocument3" class="block w-full bg-white dark:text-black cursor-pointer" type="text"
    value="{{ $assessment->eltt3 }}" readonly onclick="document.getElementById('EditelttDocument3').click()" />
<x-input-error :messages="$errors->get('eltt3')" class="mt-2" />

<x-input-label class="text-white" for="rfftpDocument3" :value="__('Request Form For Test Package')" />
<x-text-input id="EditrfftpDocument3" class="hidden" type="file" name="rfftp3"/>
<x-text-input id="EditrfftpDocument3" class="block w-full bg-white dark:text-black cursor-pointer" type="text"
    value="{{ $assessment->rfftp3 }}" readonly onclick="document.getElementById('EditrfftpDocument3').click()" />
<x-input-error :messages="$errors->get('rfftp3')" class="mt-2" />

@if($assessment->training_status3 === 'mix' || $assessment->training_status3 === 'non_scholar')
<x-input-label for="oropfafnsDocument3" :value="__('Official Receipt of Payment for Assessment for Non-Scholar')" />
<x-text-input id="EditoropfafnsDocument3" class="hidden" type="file" name="oropfafns3"/>
<x-text-input id="EditoropfafnsDocument3" class="block w-full bg-white dark:text-black cursor-pointer" type="text"
    value="{{ $assessment->oropfafns3 }}" readonly onclick="document.getElementById('EditoropfafnsDocument3').click()" />
<x-input-error :messages="$errors->get('oropfafns3')" class="mt-2" />
@endif

<x-input-label class="text-white" for="sopcctvrDocument3" :value="__('Submission of Previous CCTV Recordings')" />
<x-text-input id="EditsopcctvrDocument3" class="hidden" type="file" name="sopcctvr3"/>
<x-text-input id="EditsopcctvrDocument3" class="block w-full bg-white dark:text-black cursor-pointer" type="text"
    value="{{ $assessment->sopcctvr3 }}" readonly onclick="document.getElementById('EditsopcctvrDocument3').click()" />
<x-input-error :messages="$errors->get('sopcctvr3')" class="mt-2" />

</div>
<!-- Right Side: PDF Preview -->
<div id="Editpdf3" style="display: none; flex: 2;">
<iframe id="EditpdfView3" src="{{ $assessment->eltt3 }}" style="width: 300px; height: 300px; border: 1px solid #ccc;"></iframe>
</div>
</div>
</div>

@endif


@if(!empty($assessment->qualification4))
<!-- Document Title -->
<div id="qualificationTitle4" class="mt-4">
<h2>Provide PDF for {{$assessment->qualification4}}</h2>
</div>

<!-- Endorsement Letter To TESDA -->
<div class="mt-4">
<div style="display: flex; align-items: center; gap: 20px;">
<!-- Left Side: File Input -->
<div style="flex: 1;">

<x-input-label class="text-white" for="elttDocument4" :value="__('Endorsement Letter To TESDA')" />
<x-text-input id="EditelttDocument4" class="hidden" type="file" name="eltt4"/>
<x-text-input id="EditelttDocument4" class="block w-full bg-white dark:text-black cursor-pointer" type="text"
    value="{{ $assessment->eltt4 }}" readonly onclick="document.getElementById('EditelttDocument4').click()" />
<x-input-error :messages="$errors->get('eltt4')" class="mt-2" />

<x-input-label class="text-white" for="rfftpDocument4" :value="__('Request Form For Test Package')" />
<x-text-input id="EditrfftpDocument4" class="hidden" type="file" name="rfftp4"/>
<x-text-input id="EditrfftpDocument4" class="block w-full bg-white dark:text-black cursor-pointer" type="text"
    value="{{ $assessment->rfftp4 }}" readonly onclick="document.getElementById('EditrfftpDocument4').click()" />
<x-input-error :messages="$errors->get('rfftp4')" class="mt-2" />

@if($assessment->training_status4 === 'mix' || $assessment->training_status4 === 'non_scholar')
<x-input-label for="oropfafnsDocument4" :value="__('Official Receipt of Payment for Assessment for Non-Scholar')" />
<x-text-input id="EditoropfafnsDocument4" class="hidden" type="file" name="oropfafns4"/>
<x-text-input id="EditoropfafnsDocument4" class="block w-full bg-white dark:text-black cursor-pointer" type="text"
    value="{{ $assessment->oropfafns4 }}" readonly onclick="document.getElementById('EditoropfafnsDocument4').click()" />
<x-input-error :messages="$errors->get('oropfafns4')" class="mt-2" />
@endif

<x-input-label class="text-white" for="sopcctvrDocument4" :value="__('Submission of Previous CCTV Recordings')" />
<x-text-input id="EditsopcctvrDocument4" class="block mt-1 w-full bg-white dark:text-black" type="file" name="sopcctvr4"/>

<x-input-error :messages="$errors->get('sopcctvr4')" class="mt-2" />

</div>
<!-- Right Side: PDF Preview -->
<div id="Editpdf4" style="display: none; flex: 2;">
<iframe id="EditpdfView4" src="#" style="width: 300px; height: 300px; border: 1px solid #ccc;"></iframe>
</div>
</div>
</div>

@endif

                             <!-- Cancel Button to go back -->
                             <button type="button" id="cancel_button_Editstep2" 
    class="mt-4 px-4 py-2 bg-gray-300 text-black rounded-lg hover:bg-gray-400"
    onclick="goBackToEditStep1();">
    Back
</button>

<script>
    function goBackToEditStep1() {
        // Hide Step 2 and show Step 1
        document.getElementById('Editstep2').style.display = 'none';
        document.getElementById('Editstep1').style.display = 'block';
    }       
</script>

<div class="mt-4">
        <button id="submit_button" type="submit" 
                class="w-full bg-blue-600 text-white py-2 px-4 rounded-lg hover:bg-blue-700 focus:outline-none focus:ring-4 focus:ring-blue-300" 
         >Submit</button>


</div>

</div>
</div>
</form>





<!-- JavaScript -->
<script>
function previewEditDocument(event, containerId, iframeId) {
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
document.getElementById('next_button_edit').addEventListener('click', function () {

// Hide Step 1 and Show Step 2
document.getElementById('Editstep1').style.display = 'none';
document.getElementById('Editstep2').style.display = 'block';
});
</script>

