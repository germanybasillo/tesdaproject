
                            <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/flatpickr/dist/flatpickr.min.css">
                            <style>
                                .holiday {
                                    background-color: red !important;
                                    color: white !important;
                                    border-radius: 50%;
                                    font-weight: bold;
                                }
                            </style>

              <form action="{{ route('assessments.two') }}" method="POST" class="space-y-6" enctype="multipart/form-data">
    @csrf



				<div id="step1">

                <h2 class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight">
        <i class="fas fa-calendar-alt mr-2"></i>
        {{ __('Apply Assessment Schedule') }}
    </h2>

   <div>
    <label for="assessment_date" class="block text-sm font-medium mb-2">
        Desired Date of Assessment:    </label>
    <input 
        type="date" 
        id="assessment_date" 
        name="assessment_date" 
        required 
        class="w-full px-4 py-2 border rounded-lg focus:ring focus:ring-blue-300 bg-white dark:border-gray-600 dark:text-black"
    >
</div>


                                                          <div>
                                    <label for="qualification" class="block text-sm font-medium mb-2">
                                        Qualification:
                                    </label>
                                    <select id="qualification" name="qualification" required 
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
                                    <select id="no_of_pax" name="no_of_pax" required 
					    class="w-full px-4 py-2 border rounded-lg focus:ring focus:ring-blue-300 bg-white dark:border-gray-600 dark:text-black">
                                        <option value="" disabled selected>Select your number of tax</option>
                                        @for ($i = 1; $i <= 10; $i++)
                                            <option value="{{ $i }}">{{ $i }}</option>
                                        @endfor
                                    </select>
                                </div>

                                <div>
                                    <label for="training_status" class="block text-sm font-medium mb-2">
                                        Training Status:
                                    </label>
                                    <select id="training_status" name="training_status" required 
					    class="w-full px-4 py-2 border rounded-lg focus:ring focus:ring-blue-300 bg-white dark:border-gray-600 dark:text-black">
                                        <option value="" disabled selected>Select your training status</option>
                                        <option value="scholar">Scholar</option>
                                        <option value="non-scholar">Non-Scholar</option>
                                    </select>
                                </div>
<script>
    document.getElementById('training_status').addEventListener('change', function () {
    var scholarshipDiv = document.getElementById('scholarship_div');
    var orInputContainer = document.getElementById('orInputContainer');

    if (this.value === 'scholar') {
        scholarshipDiv.style.display = 'block';  // Show the scholarship dropdown
        orInputContainer.style.display = 'none';  // Hide the document upload field
    } else {
        scholarshipDiv.style.display = 'none';  // Hide the scholarship dropdown
        orInputContainer.style.display = 'block';  // Show the document upload field
    }
});
</script>

                                <div id="scholarship_div" style="display: none;">
                                    <label for="scholarship" class="block text-sm font-medium mb-2">
                                        Scholarship Type:
                                    </label>
				    <select id="scholarship" name="type_of_scholar" class="w-full px-4 py-2 border rounded-lg focus:ring focus:ring-blue-300 bg-white dark:border-gray-600 dark:text-black">
                                        <option value="" disabled selected>Select your scholarship type</option>
                                        <option value="ttsp">TTSP</option>
                                        <option value="cfsp">CFSP</option>
					<option value="uaqtea">UAQTEA</option>
                                        <option value="uaqtea">TWSP</option>

                                    </select>
				</div>

                <div>
                                    <label for="qualification" class="block text-sm font-medium mb-2">
                                        Qualification 2:
                                    </label>
                                    <select id="qualification2" name="qualification2" required 
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
                                    <select id="no_of_pax" name="no_of_pax2" required 
					    class="w-full px-4 py-2 border rounded-lg focus:ring focus:ring-blue-300 bg-white dark:border-gray-600 dark:text-black">
                                        <option value="" disabled selected>Select your number of tax</option>
                                        @for ($i = 1; $i <= 10; $i++)
                                            <option value="{{ $i }}">{{ $i }}</option>
                                        @endfor
                                    </select>
                                </div>

                                <div>
                                    <label for="training_status2" class="block text-sm font-medium mb-2">
                                        Training Status:
                                    </label>
                                    <select id="training_status2" name="training_status2" required 
					    class="w-full px-4 py-2 border rounded-lg focus:ring focus:ring-blue-300 bg-white dark:border-gray-600 dark:text-black">
                                        <option value="" disabled selected>Select your training status</option>
                                        <option value="scholar">Scholar</option>
                                        <option value="non-scholar">Non-Scholar</option>
                                    </select>
                                </div>


                                <script>
    document.getElementById('training_status2').addEventListener('change', function () {
    var scholarshipDiv2 = document.getElementById('scholarship_div2');
    var orInputContainer2 = document.getElementById('orInputContainer2');

    if (this.value === 'scholar') {
        scholarshipDiv2.style.display = 'block';  
        orInputContainer2.style.display = 'none';  
    } else {
        scholarshipDiv2.style.display = 'none';  
        orInputContainer2.style.display = 'block';  
    }
});
</script>

                                <div id="scholarship_div2" style="display: none;">
                                    <label for="scholarship" class="block text-sm font-medium mb-2">
                                        Scholarship Type:
                                    </label>
				    <select id="scholarship" name="type_of_scholar2" class="w-full px-4 py-2 border rounded-lg focus:ring focus:ring-blue-300 bg-white dark:border-gray-600 dark:text-black">
                                        <option value="" disabled selected>Select your scholarship type</option>
                                        <option value="ttsp">TTSP</option>
                                        <option value="cfsp">CFSP</option>
					<option value="uaqtea">UAQTEA</option>
                                        <option value="uaqtea">TWSP</option>

                                    </select>
				</div>
         

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
        class="mt-4 px-4 py-2 bg-blue-500 text-white rounded-lg hover:bg-blue-600 disabled:opacity-50" 
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
            titleElement.innerHTML = `<h3>Please add PDF for ${qualification}</h3>`;
        }
    });
</script>

<!-- Endorsement Letter To TESDA -->
<div class="mt-4">
    <x-input-label class="text-white" for="elttDocument" :value="__('Endorsement Letter To TESDA')" />
    <x-text-input id="elttDocument" class="block mt-1 w-full bg-white dark:text-black" type="file" name="eltt" placeholder="Please upload your document here (PDF)" value="{{ old('eltt') }}" autocomplete="eltt" onchange="previewDocument(event, 'elttPreviewContainer', 'elttPreview')" required/>
    <x-input-error :messages="$errors->get('eltt')" class="mt-2" />

    <!-- Document Preview -->
    <div id="elttPreviewContainer" style="display:none; margin-top: 10px; text-align: center;">
        <iframe id="elttPreview" src="#" style="width: 100%; height: 500px; border: 1px solid #ccc;"></iframe>
    </div>
</div>

<!-- Request Form For Test Package -->
<div class="mt-4">
    <x-input-label class="text-white" for="rfftpDocument" :value="__('Request Form For Test Package')" />
    <x-text-input id="rfftpDocument" class="block mt-1 w-full bg-white dark:text-black" type="file" name="rfftp" placeholder="Please upload your document here (PDF)" value="{{ old('rfftp') }}" autocomplete="rfftp" onchange="previewDocument(event, 'rfftpPreviewContainer', 'rfftpPreview')" required/>
    <x-input-error :messages="$errors->get('rfftp')" class="mt-2" />

    <!-- Document Preview -->
    <div id="rfftpPreviewContainer" style="display:none; margin-top: 10px; text-align: center;">
        <iframe id="rfftpPreview" src="#" style="width: 100%; height: 500px; border: 1px solid #ccc;"></iframe>
    </div>
</div>

<!-- Official Receipt of Payment for Assessment for Non-Scholar -->
<div class="mt-4" class="text-white" style="display: none;" id="orInputContainer">
    <x-input-label for="oropfafnsDocument" :value="__('Official Receipt of Payment for Assessment for Non-Scholar')" />
    <x-text-input id="oropfafnsDocument" class="block mt-1 w-full bg-white dark:text-black" type="file" name="oropfafns" placeholder="Please upload your document here (PDF)" value="{{ old('oropfafns') }}" autocomplete="oropfafns" onchange="previewDocument(event, 'oropfafnsPreviewContainer', 'oropfafnsPreview')"/>
    <x-input-error :messages="$errors->get('oropfafns')" class="mt-2" />

    <!-- Document Preview -->
    <div id="oropfafnsPreviewContainer" style="display:none; margin-top: 10px; text-align: center;">
        <iframe id="oropfafnsPreview" src="#" style="width: 100%; height: 500px; border: 1px solid #ccc;"></iframe>
    </div>
</div>


<!-- Submission of Previous CCTV Recordings -->
<div class="mt-4">
    <x-input-label class="text-white" for="sopcctvrDocument" :value="__('Submission of Previous CCTV Recordings')" />
    <x-text-input id="sopcctvrDocument" class="block mt-1 w-full bg-white dark:text-black" type="file" name="sopcctvr" placeholder="Please upload your document here (PDF)" value="{{ old('sopcctvr') }}" autocomplete="sopcctvr" onchange="previewDocument(event, 'sopcctvrPreviewContainer', 'sopcctvrPreview')" required/>
    <x-input-error :messages="$errors->get('oropfafns')" class="mt-2" />

    <!-- Document Preview -->
    <div id="sopcctvrPreviewContainer" style="display:none; margin-top: 10px; text-align: center;">
        <iframe id="sopcctvrPreview" src="#" style="width: 100%; height: 500px; border: 1px solid #ccc;"></iframe>
    </div>
</div>



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
            titleElement.innerHTML = `<h3>Please add PDF for ${qualification2}</h3>`;
        }
    });
</script>

<!-- Endorsement Letter To TESDA -->
<div class="mt-4">
    <x-input-label class="text-white" for="elttDocument" :value="__('Endorsement Letter To TESDA')" />
    <x-text-input id="elttDocument2" class="block mt-1 w-full bg-white dark:text-black" type="file" name="eltt2" placeholder="Please upload your document here (PDF)" value="{{ old('eltt2') }}" autocomplete="eltt2" onchange="previewDocument(event, 'elttPreviewContainer2', 'elttPreview2')" required/>
    <x-input-error :messages="$errors->get('eltt2')" class="mt-2" />

    <!-- Document Preview -->
    <div id="elttPreviewContainer2" style="display:none; margin-top: 10px; text-align: center;">
        <iframe id="elttPreview2" src="#" style="width: 100%; height: 500px; border: 1px solid #ccc;"></iframe>
    </div>
</div>

<!-- Request Form For Test Package -->
<div class="mt-4">
    <x-input-label class="text-white" for="rfftpDocument" :value="__('Request Form For Test Package')" />
    <x-text-input id="rfftpDocument2" class="block mt-1 w-full bg-white dark:text-black" type="file" name="rfftp2" placeholder="Please upload your document here (PDF)" value="{{ old('rfftp2') }}" autocomplete="rfftp2" onchange="previewDocument(event, 'rfftpPreviewContainer2', 'rfftpPreview2')" required/>
    <x-input-error :messages="$errors->get('rfftp2')" class="mt-2" />

    <!-- Document Preview -->
    <div id="rfftpPreviewContainer2" style="display:none; margin-top: 10px; text-align: center;">
        <iframe id="rfftpPreview2" src="#" style="width: 100%; height: 500px; border: 1px solid #ccc;"></iframe>
    </div>
</div>

<!-- Official Receipt of Payment for Assessment for Non-Scholar -->
<div class="mt-4" class="text-white" style="display: none;" id="orInputContainer2">
    <x-input-label for="oropfafnsDocument" :value="__('Official Receipt of Payment for Assessment for Non-Scholar')" />
    <x-text-input id="oropfafnsDocument2" class="block mt-1 w-full bg-white dark:text-black" type="file" name="oropfafns2" placeholder="Please upload your document here (PDF)" value="{{ old('oropfafns2') }}" autocomplete="oropfafns2" onchange="previewDocument(event, 'oropfafnsPreviewContainer2', 'oropfafnsPreview2')"/>
    <x-input-error :messages="$errors->get('oropfafns2')" class="mt-2" />

    <!-- Document Preview -->
    <div id="oropfafnsPreviewContainer2" style="display:none; margin-top: 10px; text-align: center;">
        <iframe id="oropfafnsPreview2" src="#" style="width: 100%; height: 500px; border: 1px solid #ccc;"></iframe>
    </div>
</div>


<!-- Submission of Previous CCTV Recordings -->
<div class="mt-4">
    <x-input-label class="text-white" for="sopcctvrDocument" :value="__('Submission of Previous CCTV Recordings')" />
    <x-text-input id="sopcctvrDocument2" class="block mt-1 w-full bg-white dark:text-black" type="file" name="sopcctvr2" placeholder="Please upload your document here (PDF)" value="{{ old('sopcctvr2') }}" autocomplete="sopcctvr2" onchange="previewDocument(event, 'sopcctvrPreviewContainer2', 'sopcctvrPreview2')" required/>
    <x-input-error :messages="$errors->get('oropfafns2')" class="mt-2" />

    <!-- Document Preview -->
    <div id="sopcctvrPreviewContainer2" style="display:none; margin-top: 10px; text-align: center;">
        <iframe id="sopcctvrPreview2" src="#" style="width: 100%; height: 500px; border: 1px solid #ccc;"></iframe>
    </div>
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

    // Basic Validation
    if (!assessmentDate || !qualification || !noOfPax || !trainingStatus) {
        alert('Please fill all the required fields in Step 1.');
        return;
    }

    // Scholar-specific validation
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
