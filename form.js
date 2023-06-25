document.addEventListener('DOMContentLoaded', function () {
    var numberOfCoursesInput = document.getElementById('numberOfCourses');
    var courseTableDiv = document.getElementById('courseTable');

    numberOfCoursesInput.addEventListener('change', function () {
        var numberOfCourses = parseInt(this.value);
        courseTableDiv.innerHTML = ''; // Clear previous course table

        var table = document.createElement('table');
        table.classList.add('course-table');
        var headerRow = table.insertRow();
        headerRow.innerHTML = '<th>Course Name</th><th>Begins At</th><th>Duration</th><th>Admission_fees</th><th>Fee Structure</th>';

        for (var i = 1; i <= numberOfCourses; i++) {
            var courseNumber = 'course' + i;

            var row = table.insertRow();
            row.innerHTML = '<td><input type="text" name="courseName[]" placeholder="Course Name" required></td>' +
                '<td><input type="text" name="beginsAt[]" placeholder="Begins At" required></td>' +
                '<td><input type="text" name="duration[]" placeholder="Duration" required></td>' +
                '<td><input type="text" name="admission_fee[]" placeholder="admission_fee" required></td>' +
                '<td><input type="text" name="feeStructure[]" placeholder="Fee_per_sem " required></td>';
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
