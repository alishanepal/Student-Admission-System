<?php
session_start();

// Retrieve stored records from the session
$records = $_SESSION['records'] ?? [];

// Function to delete a record by index
function deleteRecord($index) {
    $records = $_SESSION['records'] ?? [];

    if (isset($records[$index])) {
        unset($records[$index]);
        $_SESSION['records'] = $records;
    }
}


// Check if the delete form is submitted
if ($_SERVER['REQUEST_METHOD'] === 'POST' && isset($_POST['index'])) {
    $index = $_POST['index'];

    if (isset($_POST['delete'])) {
        deleteRecord($index);
    }

    
}

// Output the records
echo "<h1>Stored Records:</h1>";

foreach ($records as $index => $record) {
    echo "<div class='record-container'>";
    echo "<div id='record-$index'>";
    echo "<h3>College: " . $record['college'] . "</h3>";
    echo "<button onclick='showFullForm($index)'>View</button>";
    echo "</div>";

    echo "<div id='full-form-$index' class='full-form' style='display: none;'>";
    echo "<table>";
    echo "<tr><th>Field</th><th>Value</th></tr>";
    foreach ($record as $key => $value) {
        if ($key === 'courses') {
        echo "<tr><td>$key</td><td>";
        echo "<ul>";
        foreach ($value as $course) {
            echo "<li>Course ID: " . $course['courseID'] . "</li>";
            echo "<li>Course Name: " . $course['courseName'] . "</li>";
            echo "<li>Begins At: " . $course['beginsAt'] . "</li>";
            echo "<li>Duration: " . $course['duration'] . "</li>";
            echo "<li>Admission Fee: " . $course['admissionFee'] . "</li>";
            echo "<li>Fee Structure: " . $course['feeStructure'] . "</li>";
            echo "<br>";
        }
        echo "</ul>";
        echo "</td></tr>";
    } else {

        echo "<tr><td>$key</td><td>$value</td></tr>";
    }}

    echo "</table>";
    echo "<form method='post' action=''>";
    echo "<input type='hidden' name='index' value='$index'>";
    echo "<input type='submit' name='approve' value='Approve'>";
    echo "<input type='submit' name='delete' value='Delete'>";
    echo "</form>";
    echo "<button onclick='hideFullForm($index)' class='close-button'>Close</button>";
    echo "</div>";
    
    echo "</div>";
    echo "<hr>";
}
?>

<style>
    .record-container {
        position: relative;
    }

    .full-form {
        margin-top: 10px;
    }

    .close-button {
        position: absolute;
        bottom: 0;
        right: 0;
    }
</style>

<script>
    function showFullForm(index) {
        var recordDiv = document.getElementById('record-' + index);
        var fullFormDiv = document.getElementById('full-form-' + index);

        recordDiv.style.display = 'none';
        fullFormDiv.style.display = 'block';
    }

    function hideFullForm(index) {
        var recordDiv = document.getElementById('record-' + index);
        var fullFormDiv = document.getElementById('full-form-' + index);

        recordDiv.style.display = 'block';
        fullFormDiv.style.display = 'none';
    }

    function confirmDelete(index) {
        return confirm('Are you sure you want to delete this record?');
    }
</script>
