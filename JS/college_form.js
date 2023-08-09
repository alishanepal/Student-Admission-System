document.addEventListener('DOMContentLoaded', function () {
    var numberOfCoursesInput = document.getElementById('numberOfCourses');
    var courseTableDiv = document.getElementById('courseTable');

    numberOfCoursesInput.addEventListener('change', function () {
        var numberOfCourses = parseInt(this.value);
        courseTableDiv.innerHTML = ''; // Clear previous course table

        var table = document.createElement('table');
        table.classList.add('course-table');
        var headerRow = table.insertRow();
        headerRow.innerHTML = '<th>Course_Code</th><th>Course_Name</th><th>Begins_At</th><th>Duration</th><th>Admission_fees</th><th>Fee_Structure</th>';

        for (var i = 1; i <= numberOfCourses; i++) {
            var row = table.insertRow();
            row.innerHTML =
            '<td><input type="text" name="courseCode[]" placeholder="Course code" required></td>' +
            '<td><input type="text" name="courseName[]" placeholder="Course Name" required></td>' +
            '<td><input type="text" name="beginsAt[]" placeholder="Begins_At" required></td>' +
            '<td><input type="text" name="duration[]" placeholder="Duration" required></td>' +
            '<td><input type="text" name="admission_fee[]" placeholder="admission_fee" required></td>' +
            '<td><input type="text" name="feeStructure[]" placeholder="Fee_per_sem" required></td>';
        }

        courseTableDiv.appendChild(table);
    });
});


