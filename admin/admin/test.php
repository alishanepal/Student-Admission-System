<?php
session_start();
require '../../connection.php';
include "admintemplate.php";

// Fetch data from colleges, facilities, courses, and course_coll_relation tables
$query = "
    SELECT 
        c.*, 
        f.*, 
        cr.*, 
        cc.*
    FROM colleges AS c
    JOIN facilities AS f ON c.college_id = f.college_id
    JOIN course_coll_relation AS cr ON c.college_id = cr.college_id
    JOIN courses AS cc ON cr.course_id = cc.course_id"; 

$results = mysqli_query($con, $query);

if (mysqli_num_rows($results) > 0) {
    $college_data = mysqli_fetch_assoc($results);

    $courseCollData = array();
    while ($row = mysqli_fetch_assoc($results)) {
        $courseCollData[] = array(
            'course_code' => $row['course_code'],
            'course_name' => $row['course_name'],
            'begins_at' => $row['begins_at'],
            'duration' => $row['duration'],
            'admission_fee' => $row['admission_fee'],
            'fee_structure' => $row['fee_structure']
        );
    }

    mysqli_close($con);
}
?><!DOCTYPE html>
<html>
<head>
    <title>Colleges</title>
    <style>
        /* Add your CSS styling here */
        .college-details {
            display: none;
        }
        .toggle-symbol {
            display: inline-block;
            width: 1em;
            text-align: center;
            cursor: pointer;
        }
    </style>
    <script>
        // Add your JavaScript code here
        function toggleDetails(id) {
            var details = document.getElementById(id);
            var symbol = document.getElementById('symbol' + id);

            if (details.style.display === "none") {
                details.style.display = "block";
                symbol.innerHTML = "&#9660;"; // Down-pointing triangle
            } else {
                details.style.display = "none";
                symbol.innerHTML = "&#9658;"; // Right-pointing triangle
            }
        }
    </script>
</head>

<body>
    <h1>Colleges:</h1>

    <?php if (isset($results) && count($college_data) > 0): ?>
        <?php foreach ($results as $result): ?>
            <div class="college">
                <p>
                    <span class="toggle-symbol" id="symbolcollege<?= $result['college_id']; ?>" onclick="toggleDetails('college<?= $result['college_id']; ?>')">&#9658;</span>
                    College Name: <span style="cursor: pointer;" onclick="toggleDetails('college<?= $result['college_id']; ?>')"><?= $result['college_name']; ?></span>
                </p>
                <div class="college-details" id="college<?= $result['college_id']; ?>">
                    <!-- College details content -->
                </div>
            </div>
        <?php endforeach; ?>
        
    <?php else: ?>
        <p>No college data found.</p>
    <?php endif; ?>
</body>
</html>
