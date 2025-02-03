// Update Step 2 Title Based on Selected Qualification
document.getElementById('qualification').addEventListener('change', function () {
    const qualification = this.value;
    const titleElement = document.getElementById('qualificationTitle');

    if (qualification) {
        titleElement.innerHTML = `<h3>Please add a PDF for ${qualification}</h3>`;
    }
});

// Enable or Disable Next Button Based on Agreement Checkbox
document.getElementById('agreement').addEventListener('change', function () {
    const nextButton = document.getElementById('next_button');
    nextButton.disabled = !this.checked;
});

// Document Preview for Uploaded PDF
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

// Validate Form and Proceed to Step 2
document.getElementById('next_button').addEventListener('click', function () {
    const assessmentDate = document.getElementById('assessment_date').value;
    const qualification = document.getElementById('qualification').value;
    const noOfPax = document.getElementById('no_of_pax').value;
    const trainingStatus = document.getElementById('training_status').value;

    // Basic validation
    if (!assessmentDate || !qualification || !noOfPax || !trainingStatus) {
        alert('Please fill in all required fields in Step 1.');
        return;
    }

    // Additional validation for scholars
    if (trainingStatus === 'scholar') {
        const scholarshipType = document.getElementById('scholarship').value;
        if (!scholarshipType) {
            alert('Please select a scholarship type.');
            return;
        }
    }

    // Transition to Step 2
    document.getElementById('step1').style.display = 'none';
    document.getElementById('step2').style.display = 'block';
});

// Toggle Scholarship Dropdown Based on Training Status
document.getElementById('training_status').addEventListener('change', function () {
    const scholarshipDiv = document.getElementById('scholarship_div');
    scholarshipDiv.style.display = this.value === 'scholar' ? 'block' : 'none';
});

// Initialize Date Picker with Holiday Highlighting
const holidays = [
    "2025-01-01",  // New Year's Day
    "2025-02-14",  // Valentine's Day
    "2025-04-01",  // April Fools' Day
    "2025-12-25"   // Christmas
];

flatpickr("#assessment_date", {
    altInput: true,
    altFormat: "F j, Y",
    dateFormat: "Y-m-d",
    minDate: "today",
    onDayCreate: function (dObj, dStr, fp, dayElem) {
        const dateStr = dayElem.dateObj.toISOString().slice(0, 10);
        if (holidays.includes(dateStr)) {
            dayElem.classList.add("holiday");
        }
    }
});

