document.addEventListener('DOMContentLoaded', function () {
    var numberOfCoursesInput = document.getElementById('numberOfCourses');
    var courseTableDiv = document.getElementById('courseTable');

    numberOfCoursesInput.addEventListener('change', function () {
        var numberOfCourses = parseInt(this.value);
        courseTableDiv.innerHTML = ''; // Clear previous course table

        var table = document.createElement('table');
        table.classList.add('course-table');
        var headerRow = table.insertRow();
        headerRow.innerHTML = '<th>Course_Code</th><th>Course_Name</th><th>Begins At</th><th>Duration</th><th>Admission_fees</th><th>Fee_Structure</th>';

        for (var i = 1; i <= numberOfCourses; i++) {
            var courseNumber = 'course' + i;

            var row = table.insertRow();
            row.innerHTML =
            '<td><input type="text" name="courseCode[]" placeholder="Course code" required value="<?php echo $courseCode; ?>"></td>' +
            '<td><input type="text" name="courseName[]" placeholder="Course Name" required value="<?php echo $courseName; ?>"></td>' +
            '<td><input type="text" name="beginsAt[]" placeholder="Begins At" required value="<?php echo $beginsAt; ?>"></td>' +
            '<td><input type="text" name="duration[]" placeholder="Duration" required value="<?php echo $duration; ?>"></td>' +
            '<td><input type="text" name="admission_fee[]" placeholder="admission_fee" required value="<?php echo $admissionFee; ?>"></td>' +
            '<td><input type="text" name="feeStructure[]" placeholder="Fee_per_sem" required value="<?php echo $feeStructure; ?>"></td>';
}

        courseTableDiv.appendChild(table);
    });
});

function validateForm() {
    var checkbox = document.getElementById("declarationCheckbox");
    var errorText = document.getElementById("declarationError");

    if (!checkbox.checked) {
        errorText.style.display = "block";
        return false; // Prevent form submission
    }

    errorText.style.display = "none";
    return true; // Allow form submission
}