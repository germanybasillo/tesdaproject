<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight"><i class="fas fa-calendar-alt mr-2"></i>
            {{ __('Apply Assessment Schedule') }}
        </h2>
    </x-slot>


<div class="py-12">
    <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
        <div class="bg-white dark:bg-gray-800 overflow-hidden shadow-sm sm:rounded-lg">
            <div class="py-12 flex items-center justify-center min-h-screen">
                <div class="w-1/2 sm:px-6 lg:px-8">
                    <div class="bg-white dark:bg-gray-800 overflow-hidden shadow-sm sm:rounded-lg">
                        <div class="p-8 text-gray-900 dark:text-gray-100">
                            
                      

              <form action="{{ route('assessments.store') }}" method="POST" class="space-y-6" enctype="multipart/form-data">
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
        class="w-full px-4 py-2 border rounded-lg focus:ring focus:ring-blue-300 dark:bg-gray-700 dark:border-gray-600 dark:text-gray-100"
    >
</div>

<div id="qualification_container">
    <div class="qualification_block">

                                    <label for="qualification" class="block text-sm font-medium mb-2">
                                        Qualification:
                                    </label>
                                    <select id="qualification" name="qualification" required 
					    class="w-full px-4 py-2 border rounded-lg focus:ring focus:ring-blue-300 dark:bg-gray-700 dark:border-gray-600 dark:text-gray-100">
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
					    class="w-full px-4 py-2 border rounded-lg focus:ring focus:ring-blue-300 dark:bg-gray-700 dark:border-gray-600 dark:text-gray-100">
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
        class="w-full px-4 py-2 border rounded-lg focus:ring focus:ring-blue-300 dark:bg-gray-700 dark:border-gray-600 dark:text-gray-100"
        onchange="toggleDocumentField()">
        <option value="" disabled selected>Select your training status</option>
        <option value="scholar">Scholar</option>
        <option value="non-scholar">Non-Scholar</option>
    </select>
</div>

                                <div id="scholarship_div" style="display: none;">
                                    <label for="scholarship" class="block text-sm font-medium mb-2">
                                        Scholarship Type:
                                    </label>
				    <select id="scholarship" name="type_of_scholar" class="w-full px-4 py-2 border rounded-lg focus:ring focus:ring-blue-300 dark:bg-gray-700 dark:border-gray-600 dark:text-gray-100">
                                        <option value="" disabled selected>Select your scholarship type</option>
                                        <option value="ttsp">TTSP</option>
                                        <option value="cfsp">CFSP</option>
					<option value="uaqtea">UAQTEA</option>
                                        <option value="uaqtea">TWSP</option>

                                    </select>
				</div>
                </div>

       ===============================================================================================
       
       <div id="qualification_container">
    <div class="qualification_block">

                                    <label for="qualification" class="block text-sm font-medium mb-2">
                                        Qualification:
                                    </label>
                                    <select id="qualification" name="qualification" required 
					    class="w-full px-4 py-2 border rounded-lg focus:ring focus:ring-blue-300 dark:bg-gray-700 dark:border-gray-600 dark:text-gray-100">
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
					    class="w-full px-4 py-2 border rounded-lg focus:ring focus:ring-blue-300 dark:bg-gray-700 dark:border-gray-600 dark:text-gray-100">
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
        class="w-full px-4 py-2 border rounded-lg focus:ring focus:ring-blue-300 dark:bg-gray-700 dark:border-gray-600 dark:text-gray-100"
        onchange="toggleDocumentField()">
        <option value="" disabled selected>Select your training status</option>
        <option value="scholar">Scholar</option>
        <option value="non-scholar">Non-Scholar</option>
    </select>
</div>

                                <div id="scholarship_div" style="display: none;">
                                    <label for="scholarship" class="block text-sm font-medium mb-2">
                                        Scholarship Type:
                                    </label>
				    <select id="scholarship" name="type_of_scholar" class="w-full px-4 py-2 border rounded-lg focus:ring focus:ring-blue-300 dark:bg-gray-700 dark:border-gray-600 dark:text-gray-100">
                                        <option value="" disabled selected>Select your scholarship type</option>
                                        <option value="ttsp">TTSP</option>
                                        <option value="cfsp">CFSP</option>
					<option value="uaqtea">UAQTEA</option>
                                        <option value="uaqtea">TWSP</option>

                                    </select>
				</div>
                </div>

      ===============================================================================================================
      
      <div id="qualification_container">
    <div class="qualification_block">

                                    <label for="qualification" class="block text-sm font-medium mb-2">
                                        Qualification:
                                    </label>
                                    <select id="qualification" name="qualification" required 
					    class="w-full px-4 py-2 border rounded-lg focus:ring focus:ring-blue-300 dark:bg-gray-700 dark:border-gray-600 dark:text-gray-100">
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
					    class="w-full px-4 py-2 border rounded-lg focus:ring focus:ring-blue-300 dark:bg-gray-700 dark:border-gray-600 dark:text-gray-100">
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
        class="w-full px-4 py-2 border rounded-lg focus:ring focus:ring-blue-300 dark:bg-gray-700 dark:border-gray-600 dark:text-gray-100"
        onchange="toggleDocumentField()">
        <option value="" disabled selected>Select your training status</option>
        <option value="scholar">Scholar</option>
        <option value="non-scholar">Non-Scholar</option>
    </select>
</div>

                                <div id="scholarship_div" style="display: none;">
                                    <label for="scholarship" class="block text-sm font-medium mb-2">
                                        Scholarship Type:
                                    </label>
				    <select id="scholarship" name="type_of_scholar" class="w-full px-4 py-2 border rounded-lg focus:ring focus:ring-blue-300 dark:bg-gray-700 dark:border-gray-600 dark:text-gray-100">
                                        <option value="" disabled selected>Select your scholarship type</option>
                                        <option value="ttsp">TTSP</option>
                                        <option value="cfsp">CFSP</option>
					<option value="uaqtea">UAQTEA</option>
                                        <option value="uaqtea">TWSP</option>

                                    </select>
				</div>
                </div>

             =======================================================================================
             
             <div id="qualification_container">
    <div class="qualification_block">

                                    <label for="qualification" class="block text-sm font-medium mb-2">
                                        Qualification:
                                    </label>
                                    <select id="qualification" name="qualification" required 
					    class="w-full px-4 py-2 border rounded-lg focus:ring focus:ring-blue-300 dark:bg-gray-700 dark:border-gray-600 dark:text-gray-100">
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
					    class="w-full px-4 py-2 border rounded-lg focus:ring focus:ring-blue-300 dark:bg-gray-700 dark:border-gray-600 dark:text-gray-100">
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
        class="w-full px-4 py-2 border rounded-lg focus:ring focus:ring-blue-300 dark:bg-gray-700 dark:border-gray-600 dark:text-gray-100"
        onchange="toggleDocumentField()">
        <option value="" disabled selected>Select your training status</option>
        <option value="scholar">Scholar</option>
        <option value="non-scholar">Non-Scholar</option>
    </select>
</div>

                                <div id="scholarship_div" style="display: none;">
                                    <label for="scholarship" class="block text-sm font-medium mb-2">
                                        Scholarship Type:
                                    </label>
				    <select id="scholarship" name="type_of_scholar" class="w-full px-4 py-2 border rounded-lg focus:ring focus:ring-blue-300 dark:bg-gray-700 dark:border-gray-600 dark:text-gray-100">
                                        <option value="" disabled selected>Select your scholarship type</option>
                                        <option value="ttsp">TTSP</option>
                                        <option value="cfsp">CFSP</option>
					<option value="uaqtea">UAQTEA</option>
                                        <option value="uaqtea">TWSP</option>

                                    </select>
				</div>
                </div>
        

<div>
    <label for="agreement" class="flex items-center space-x-2">
        <input type="checkbox" id="agreement" class="rounded border-gray-300 text-blue-600 focus:ring-blue-500" />
        <span>I agree to the terms and conditions.</span>
    </label>
</div>
    
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

<!-- Endorsement Letter To TESDA -->
<div class="mt-4">
    <x-input-label for="elttDocument" :value="__('Endorsement Letter To TESDA')" />
    <x-text-input id="elttDocument" class="block mt-1 w-full" type="file" name="eltt" accept="application/pdf" placeholder="Please upload your document here (PDF)" value="{{ old('eltt') }}" autocomplete="eltt" onchange="previewDocument(event, 'elttPreviewContainer', 'elttPreview')" required/>
    <x-input-error :messages="$errors->get('eltt')" class="mt-2" />

    <!-- Document Preview -->
    <div id="elttPreviewContainer" style="display:none; margin-top: 10px; text-align: center;">
        <iframe id="elttPreview" src="#" style="width: 100%; height: 500px; border: 1px solid #ccc;"></iframe>
    </div>
</div>

<!-- Request Form For Test Package -->
<div class="mt-4">
    <x-input-label for="rfftpDocument" :value="__('Request Form For Test Package')" />
    <x-text-input id="rfftpDocument" class="block mt-1 w-full" type="file" name="rfftp" accept="application/pdf" placeholder="Please upload your document here (PDF)" value="{{ old('rfftp') }}" autocomplete="rfftp" onchange="previewDocument(event, 'rfftpPreviewContainer', 'rfftpPreview')" required/>
    <x-input-error :messages="$errors->get('rfftp')" class="mt-2" />

    <!-- Document Preview -->
    <div id="rfftpPreviewContainer" style="display:none; margin-top: 10px; text-align: center;">
        <iframe id="rfftpPreview" src="#" style="width: 100%; height: 500px; border: 1px solid #ccc;"></iframe>
    </div>
</div>

<!-- Official Receipt of Payment for Assessment for Non-Scholar -->
<div id="oropfafnsContainer" class="mt-4" style="display: none;">
    <x-input-label for="oropfafnsDocument" :value="__('Official Receipt of Payment for Assessment for Non-Scholar')" />
    <x-text-input id="oropfafnsDocument" class="block mt-1 w-full" accept="application/pdf" type="file" name="oropfafns"
        placeholder="Please upload your document here (PDF)" value="{{ old('oropfafns') }}"
        autocomplete="oropfafns" onchange="previewDocument(event, 'oropfafnsPreviewContainer', 'oropfafnsPreview')" />
    <x-input-error :messages="$errors->get('oropfafns')" class="mt-2" />

    <!-- Document Preview -->
    <div id="oropfafnsPreviewContainer" style="display:none; margin-top: 10px; text-align: center;">
        <iframe id="oropfafnsPreview" src="#" style="width: 100%; height: 500px; border: 1px solid #ccc;"></iframe>
    </div>
</div>


<!-- Submission of Previous CCTV Recordings -->
<div class="mt-4">
    <x-input-label for="sopcctvrDocument" :value="__('Submission of Previous CCTV Recordings')" />
    <x-text-input id="sopcctvrDocument" class="block mt-1 w-full" accept="application/pdf" type="file" name="sopcctvr" placeholder="Please upload your document here (PDF)" value="{{ old('sopcctvr') }}" autocomplete="sopcctvr" onchange="previewDocument(event, 'sopcctvrPreviewContainer', 'sopcctvrPreview')" required/>
    <x-input-error :messages="$errors->get('oropfafns')" class="mt-2" />

    <!-- Document Preview -->
    <div id="sopcctvrPreviewContainer" style="display:none; margin-top: 10px; text-align: center;">
        <iframe id="sopcctvrPreview" src="#" style="width: 100%; height: 500px; border: 1px solid #ccc;"></iframe>
    </div>
</div>
 
==========================================================================

 <!-- Document Title -->
 <div id="qualificationTitle" class="mt-4">
            <h2>Please upload your document here (PDF)</h2>
        </div>

<!-- Endorsement Letter To TESDA -->
<div class="mt-4">
    <x-input-label for="elttDocument" :value="__('Endorsement Letter To TESDA')" />
    <x-text-input id="elttDocument" class="block mt-1 w-full" type="file" name="eltt" accept="application/pdf" placeholder="Please upload your document here (PDF)" value="{{ old('eltt') }}" autocomplete="eltt" onchange="previewDocument(event, 'elttPreviewContainer', 'elttPreview')" required/>
    <x-input-error :messages="$errors->get('eltt')" class="mt-2" />

    <!-- Document Preview -->
    <div id="elttPreviewContainer" style="display:none; margin-top: 10px; text-align: center;">
        <iframe id="elttPreview" src="#" style="width: 100%; height: 500px; border: 1px solid #ccc;"></iframe>
    </div>
</div>

<!-- Request Form For Test Package -->
<div class="mt-4">
    <x-input-label for="rfftpDocument" :value="__('Request Form For Test Package')" />
    <x-text-input id="rfftpDocument" class="block mt-1 w-full" type="file" name="rfftp" accept="application/pdf" placeholder="Please upload your document here (PDF)" value="{{ old('rfftp') }}" autocomplete="rfftp" onchange="previewDocument(event, 'rfftpPreviewContainer', 'rfftpPreview')" required/>
    <x-input-error :messages="$errors->get('rfftp')" class="mt-2" />

    <!-- Document Preview -->
    <div id="rfftpPreviewContainer" style="display:none; margin-top: 10px; text-align: center;">
        <iframe id="rfftpPreview" src="#" style="width: 100%; height: 500px; border: 1px solid #ccc;"></iframe>
    </div>
</div>

<!-- Official Receipt of Payment for Assessment for Non-Scholar -->
<div id="oropfafnsContainer" class="mt-4" style="display: none;">
    <x-input-label for="oropfafnsDocument" :value="__('Official Receipt of Payment for Assessment for Non-Scholar')" />
    <x-text-input id="oropfafnsDocument" class="block mt-1 w-full" accept="application/pdf" type="file" name="oropfafns"
        placeholder="Please upload your document here (PDF)" value="{{ old('oropfafns') }}"
        autocomplete="oropfafns" onchange="previewDocument(event, 'oropfafnsPreviewContainer', 'oropfafnsPreview')" />
    <x-input-error :messages="$errors->get('oropfafns')" class="mt-2" />

    <!-- Document Preview -->
    <div id="oropfafnsPreviewContainer" style="display:none; margin-top: 10px; text-align: center;">
        <iframe id="oropfafnsPreview" src="#" style="width: 100%; height: 500px; border: 1px solid #ccc;"></iframe>
    </div>
</div>


<!-- Submission of Previous CCTV Recordings -->
<div class="mt-4">
    <x-input-label for="sopcctvrDocument" :value="__('Submission of Previous CCTV Recordings')" />
    <x-text-input id="sopcctvrDocument" class="block mt-1 w-full" accept="application/pdf" type="file" name="sopcctvr" placeholder="Please upload your document here (PDF)" value="{{ old('sopcctvr') }}" autocomplete="sopcctvr" onchange="previewDocument(event, 'sopcctvrPreviewContainer', 'sopcctvrPreview')" required/>
    <x-input-error :messages="$errors->get('oropfafns')" class="mt-2" />

    <!-- Document Preview -->
    <div id="sopcctvrPreviewContainer" style="display:none; margin-top: 10px; text-align: center;">
        <iframe id="sopcctvrPreview" src="#" style="width: 100%; height: 500px; border: 1px solid #ccc;"></iframe>
    </div>
</div>

======================================================================================================

 <!-- Document Title -->
 <div id="qualificationTitle" class="mt-4">
            <h2>Please upload your document here (PDF)</h2>
        </div>

<!-- Endorsement Letter To TESDA -->
<div class="mt-4">
    <x-input-label for="elttDocument" :value="__('Endorsement Letter To TESDA')" />
    <x-text-input id="elttDocument" class="block mt-1 w-full" type="file" name="eltt" accept="application/pdf" placeholder="Please upload your document here (PDF)" value="{{ old('eltt') }}" autocomplete="eltt" onchange="previewDocument(event, 'elttPreviewContainer', 'elttPreview')" required/>
    <x-input-error :messages="$errors->get('eltt')" class="mt-2" />

    <!-- Document Preview -->
    <div id="elttPreviewContainer" style="display:none; margin-top: 10px; text-align: center;">
        <iframe id="elttPreview" src="#" style="width: 100%; height: 500px; border: 1px solid #ccc;"></iframe>
    </div>
</div>

<!-- Request Form For Test Package -->
<div class="mt-4">
    <x-input-label for="rfftpDocument" :value="__('Request Form For Test Package')" />
    <x-text-input id="rfftpDocument" class="block mt-1 w-full" type="file" name="rfftp" accept="application/pdf" placeholder="Please upload your document here (PDF)" value="{{ old('rfftp') }}" autocomplete="rfftp" onchange="previewDocument(event, 'rfftpPreviewContainer', 'rfftpPreview')" required/>
    <x-input-error :messages="$errors->get('rfftp')" class="mt-2" />

    <!-- Document Preview -->
    <div id="rfftpPreviewContainer" style="display:none; margin-top: 10px; text-align: center;">
        <iframe id="rfftpPreview" src="#" style="width: 100%; height: 500px; border: 1px solid #ccc;"></iframe>
    </div>
</div>

<!-- Official Receipt of Payment for Assessment for Non-Scholar -->
<div id="oropfafnsContainer" class="mt-4" style="display: none;">
    <x-input-label for="oropfafnsDocument" :value="__('Official Receipt of Payment for Assessment for Non-Scholar')" />
    <x-text-input id="oropfafnsDocument" class="block mt-1 w-full" accept="application/pdf" type="file" name="oropfafns"
        placeholder="Please upload your document here (PDF)" value="{{ old('oropfafns') }}"
        autocomplete="oropfafns" onchange="previewDocument(event, 'oropfafnsPreviewContainer', 'oropfafnsPreview')" />
    <x-input-error :messages="$errors->get('oropfafns')" class="mt-2" />

    <!-- Document Preview -->
    <div id="oropfafnsPreviewContainer" style="display:none; margin-top: 10px; text-align: center;">
        <iframe id="oropfafnsPreview" src="#" style="width: 100%; height: 500px; border: 1px solid #ccc;"></iframe>
    </div>
</div>


<!-- Submission of Previous CCTV Recordings -->
<div class="mt-4">
    <x-input-label for="sopcctvrDocument" :value="__('Submission of Previous CCTV Recordings')" />
    <x-text-input id="sopcctvrDocument" class="block mt-1 w-full" accept="application/pdf" type="file" name="sopcctvr" placeholder="Please upload your document here (PDF)" value="{{ old('sopcctvr') }}" autocomplete="sopcctvr" onchange="previewDocument(event, 'sopcctvrPreviewContainer', 'sopcctvrPreview')" required/>
    <x-input-error :messages="$errors->get('oropfafns')" class="mt-2" />

    <!-- Document Preview -->
    <div id="sopcctvrPreviewContainer" style="display:none; margin-top: 10px; text-align: center;">
        <iframe id="sopcctvrPreview" src="#" style="width: 100%; height: 500px; border: 1px solid #ccc;"></iframe>
    </div>
</div>

============================================================================

 <!-- Document Title -->
 <div id="qualificationTitle" class="mt-4">
            <h2>Please upload your document here (PDF)</h2>
        </div>

<!-- Endorsement Letter To TESDA -->
<div class="mt-4">
    <x-input-label for="elttDocument" :value="__('Endorsement Letter To TESDA')" />
    <x-text-input id="elttDocument" class="block mt-1 w-full" type="file" name="eltt" accept="application/pdf" placeholder="Please upload your document here (PDF)" value="{{ old('eltt') }}" autocomplete="eltt" onchange="previewDocument(event, 'elttPreviewContainer', 'elttPreview')" required/>
    <x-input-error :messages="$errors->get('eltt')" class="mt-2" />

    <!-- Document Preview -->
    <div id="elttPreviewContainer" style="display:none; margin-top: 10px; text-align: center;">
        <iframe id="elttPreview" src="#" style="width: 100%; height: 500px; border: 1px solid #ccc;"></iframe>
    </div>
</div>

<!-- Request Form For Test Package -->
<div class="mt-4">
    <x-input-label for="rfftpDocument" :value="__('Request Form For Test Package')" />
    <x-text-input id="rfftpDocument" class="block mt-1 w-full" type="file" name="rfftp" accept="application/pdf" placeholder="Please upload your document here (PDF)" value="{{ old('rfftp') }}" autocomplete="rfftp" onchange="previewDocument(event, 'rfftpPreviewContainer', 'rfftpPreview')" required/>
    <x-input-error :messages="$errors->get('rfftp')" class="mt-2" />

    <!-- Document Preview -->
    <div id="rfftpPreviewContainer" style="display:none; margin-top: 10px; text-align: center;">
        <iframe id="rfftpPreview" src="#" style="width: 100%; height: 500px; border: 1px solid #ccc;"></iframe>
    </div>
</div>

<!-- Official Receipt of Payment for Assessment for Non-Scholar -->
<div id="oropfafnsContainer" class="mt-4" style="display: none;">
    <x-input-label for="oropfafnsDocument" :value="__('Official Receipt of Payment for Assessment for Non-Scholar')" />
    <x-text-input id="oropfafnsDocument" class="block mt-1 w-full" accept="application/pdf" type="file" name="oropfafns"
        placeholder="Please upload your document here (PDF)" value="{{ old('oropfafns') }}"
        autocomplete="oropfafns" onchange="previewDocument(event, 'oropfafnsPreviewContainer', 'oropfafnsPreview')" />
    <x-input-error :messages="$errors->get('oropfafns')" class="mt-2" />

    <!-- Document Preview -->
    <div id="oropfafnsPreviewContainer" style="display:none; margin-top: 10px; text-align: center;">
        <iframe id="oropfafnsPreview" src="#" style="width: 100%; height: 500px; border: 1px solid #ccc;"></iframe>
    </div>
</div>


<!-- Submission of Previous CCTV Recordings -->
<div class="mt-4">
    <x-input-label for="sopcctvrDocument" :value="__('Submission of Previous CCTV Recordings')" />
    <x-text-input id="sopcctvrDocument" class="block mt-1 w-full" accept="application/pdf" type="file" name="sopcctvr" placeholder="Please upload your document here (PDF)" value="{{ old('sopcctvr') }}" autocomplete="sopcctvr" onchange="previewDocument(event, 'sopcctvrPreviewContainer', 'sopcctvrPreview')" required/>
    <x-input-error :messages="$errors->get('oropfafns')" class="mt-2" />

    <!-- Document Preview -->
    <div id="sopcctvrPreviewContainer" style="display:none; margin-top: 10px; text-align: center;">
        <iframe id="sopcctvrPreview" src="#" style="width: 100%; height: 500px; border: 1px solid #ccc;"></iframe>
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



				</div>
</div>
</form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
</x-app-layout>