<?php
require_once "admintemplate.php";
session_start();

// Retrieve stored records from the session
$records = $_SESSION['records'] ?? [];

// Output the records
echo "<h1>New Applications:</h1>";

foreach ($records as $index => $record) {
    echo "<div class='record-container'>";
    echo "<div id='record-$index'>";
    echo "<h3>College: " . $record['collegeName'] . "</h3>";
    echo "<button onclick='showFullForm($index)'>View</button>";
    echo "</div>";

    echo "<div id='full-form-$index' class='full-form' style='display: none;'>";

    echo "<table>";
    echo "<tr><th>Field</th><th>Value</th></tr>";
    foreach ($record as $key => $value) {
        if ($key === 'courses') {
            echo "<tr><td>$key</td><td>";
            echo "<ul>";
            foreach($record['courses'] as $course) {
                echo "<li>Course Code: " . $course['courseCode'] . "</li>";
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
        }
    }
    echo "</table>";

    echo "<form method='post' action='../college/del_approv.php'>";
    echo "<input type='hidden' name='index' value='$index'>";
    echo "<button type='submit' name='action' value='approve'>Approve</button>";
    echo "<button type='submit' name='action' value='delete' onclick='return confirmDelete($index)'>Delete</button>";
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
