<?php
require('../../connection.php');


// Retrieve college data with associated course data
$query = "SELECT c.college_id, c.college_name, c.address, c.phone_number, c.email, c.establishment_date, c.college_type, c.authority_name, co.course_code, co.course_name, cr.begins_at, cr.duration, cr.admission_fee, cr.fee_structure
          FROM colleges c
          JOIN course_coll_relation cr ON c.college_id = cr.college_id
          JOIN courses co ON cr.course_id = co.course_id";
$result = mysqli_query($con, $query);

// Fetch all the college records
$colleges = array();
while ($row = mysqli_fetch_assoc($result)) {
    $collegeId = $row['college_id'];
    if (!isset($colleges[$collegeId])) {
        $colleges[$collegeId] = array(
            'college_id' => $collegeId,
            'college_name' => $row['college_name'],
            'address' => $row['address'],
            'phone_number' => $row['phone_number'],
            'email' => $row['email'],
            'establishment_date' => $row['establishment_date'],
            'college_type' => $row['college_type'],
            'authority_name' => $row['authority_name'],
            'courses' => array()
        );
    }
    $colleges[$collegeId]['courses'][] = array(
        'course_code' => $row['course_code'],
        'course_name' => $row['course_name'],
        'begins_at' => $row['begins_at'],
        'duration' => $row['duration'],
        'admission_fee' => $row['admission_fee'],
        'fee_structure' => $row['fee_structure']
    );
}

// Close the database connection
mysqli_close($con);
?>
 <?php include "../admin/admintemplate.php"?>
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

    <?php foreach ($colleges as $college) : ?>
        <h2>
            <span class="toggle-data" onclick="toggleData('data-<?= $college['college_id']; ?>')">&#9658;</span>
            <?= $college['college_name']; ?>
        </h2>
        <div id="data-<?= $college['college_id']; ?>" class="hidden-data">
            <p><strong>Address:</strong> <?= $college['address']; ?></p>
            <p><strong>Phone Number:</strong> <?= $college['phone_number']; ?></p>
            <p><strong>Email:</strong> <?= $college['email']; ?></p>
            <p><strong>Establishment Date:</strong> <?= $college['establishment_date']; ?></p>
            <p><strong>College Type:</strong> <?= $college['college_type']; ?></p>
            <p><strong>Authority Name:</strong> <?= $college['authority_name']; ?></p>

            <table>
                <tr>
                    <th>Course Code</th>
                    <th>Course Name</th>
                    <th>Begins At</th>
                    <th>Duration</th>
                    <th>Admission Fee</th>
                    <th>Fee Structure</th>
                </tr>
                <?php foreach ($college['courses'] as $course) : ?>
                    <tr>
                        <td><?= $course['course_code']; ?></td>
                        <td><?= $course['course_name']; ?></td>
                        <td><?= $course['begins_at']; ?></td>
                        <td><?= $course['duration']; ?></td>
                        <td><?= $course['admission_fee']; ?></td>
                        <td><?= $course['fee_structure']; ?></td>
                    </tr>
                <?php endforeach; ?>
            </table>
        </div>
        <br>
    <?php endforeach; ?>
</body>
</html>
