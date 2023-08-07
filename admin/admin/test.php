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
?>
<!DOCTYPE html>
<html>
<head>
    <title>Colleges</title>
    <style>
        table {
            border-collapse: collapse;
        }
        table th, table td {
            border: 1px solid black;
            padding: 8px;
        }
        .toggle-data {
            cursor: pointer;
            font-weight: bold;
            text-decoration: underline;
        }
        .hidden-data {
            display: none;
        }
    </style>
    <script>
        function toggleData(elementId) {
            var element = document.getElementById(elementId);
            if (element.style.display === "none") {
                element.style.display = "block";
            } else {
                element.style.display = "none";
            }
        }
    </script>
    
</head>

<body>
    <h1>Colleges:</h1>

    <?php if (isset($results) && count($college_data) > 0): ?>
        <?php foreach ($results as $result): ?>
            <h2>
                <span class="toggle-data" onclick="toggleData('data-<?= $college_data['college_id']; ?>')">&#9658;</span>
                <?= $college_data['college_name']; ?>
            </h2>
            
           
        <p>College Name: <?= $college_data['college_name']; ?></p>
        <p>Address: <?= $college_data['address']; ?></p>
        <p>Phone Number: <?= $college_data['phone_number']; ?></p>
        <p>Email: <?= $college_data['email']; ?></p>
      <p> establishment_date: <?=$college_data['establishment_date']; ?></p>

        <h2>Facilities</h2>
        <p>Campus Size: <?= $college_data['campus_size']; ?></p>
        <p>Number of Classrooms: <?= $college_data['number_of_classrooms']; ?></p>
        <p>Number of Labs: <?= $college_data['number_of_labs']; ?></p>
        <p>Number of Libraries: <?= $college_data['number_of_libraries']; ?></p>
        <p>Number of Hostels: <?= $college_data['number_of_hostels']; ?></p>
     

        <table>
        <tr>
            <th>Course Code</th>
            <th>Course Name</th>
            <th>Begins At</th>
            <th>Duration</th>
            <th>Admission Fee</th>
            <th>Fee Structure</th>
        </tr>
        <?php foreach ($courseCollData as $courseColl) : ?>
            <tr>
                <td><?= $courseColl['course_code']; ?></td>
                <td><?= $courseColl['course_name']; ?></td>
                <td><?= $courseColl['begins_at']; ?></td>
                <td><?= $courseColl['duration']; ?></td>
                <td><?= $courseColl['admission_fee']; ?></td>
                <td><?= $courseColl['fee_structure']; ?></td>
            </tr>
        <?php endforeach; ?>
        </table> <!-- Added closing table tag -->
        <?php endforeach; ?>
        
    <?php else: ?>
        <p>No college data found.</p>
        <?php endif; ?>
</body>
</html>