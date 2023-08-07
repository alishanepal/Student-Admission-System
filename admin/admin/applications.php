<?php
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
    JOIN courses AS cc ON cr.course_id = cc.course_id
    WHERE c.status = 'pending'"; 

$results = mysqli_query($con, $query);

$college_data = array();

while ($row = mysqli_fetch_assoc($results)) {
    $college_id = $row['college_id'];

    if (!isset($college_data[$college_id])) {
        $college_data[$college_id] = array(
            'college_name' => $row['college_name'],
            'address' => $row['address'],
            'phone_number' => $row['phone_number'],
            'email' => $row['email'],
            'establishment_date' => $row['establishment_date'],
            'campus_size' => $row['campus_size'],
            'number_of_classrooms' => $row['number_of_classrooms'],
            'number_of_labs' => $row['number_of_labs'],
            'number_of_libraries' => $row['number_of_libraries'],
            'number_of_hostels' => $row['number_of_hostels'],
            'courses' => array(),
        );
    }

    $college_data[$college_id]['courses'][] = array(
        'course_code' => $row['course_code'],
        'course_name' => $row['course_name'],
        'begins_at' => $row['begins_at'],
        'duration' => $row['duration'],
        'admission_fee' => $row['admission_fee'],
        'fee_structure' => $row['fee_structure'],
    );
}

mysqli_close($con);
?>

<!DOCTYPE html>
<html>
<head>
    <title>Colleges</title>
    <style>
        /* Add your CSS styling here */
        .college-details {
            display: none;
        }
        .toggle-symbol {
            cursor: pointer;
            font-size: 1.5em;
        }
    </style>
    <script>
        function toggleDetails(id) {
            var details = document.getElementById('college-details-' + id);
            var symbol = document.getElementById('symbol' + id);

            if (details.style.display === "none") {
                details.style.display = "block";
            } else {
                details.style.display = "none";
            }
        }
    </script>
</head>
<body>
    <h1>Colleges:</h1>

    <?php if (!empty($college_data)): ?>
        <?php foreach ($college_data as $college_id => $college): ?>
            <div class="college">
                <p>
                    <span class="toggle-symbol" id="symbolcollege<?= $college_id; ?>" onclick="toggleDetails('college<?= $college_id; ?>')">&#9658;</span>
                    <strong><?= $college['college_name']; ?></strong>
                </p>
                <div class="college-details" id="college-details-college<?= $college_id; ?>">
                    <p>Address: <?= $college['address']; ?></p>
                    <p>Phone Number: <?= $college['phone_number']; ?></p>
                    <p>Email: <?= $college['email']; ?></p>
                    <p>Establishment Date: <?= $college['establishment_date']; ?></p>

                    <h2>Facilities</h2>
                    <p>Campus Size: <?= $college['campus_size']; ?></p>
                    <p>Number of Classrooms: <?= $college['number_of_classrooms']; ?></p>
                    <p>Number of Labs: <?= $college['number_of_labs']; ?></p>
                    <p>Number of Libraries: <?= $college['number_of_libraries']; ?></p>
                    <p>Number of Hostels: <?= $college['number_of_hostels']; ?></p>

                    <table>
                        <tr>
                            <th>Course Code</th>
                            <th>Course Name</th>
                            <th>Begins At</th>
                            <th>Duration</th>
                            <th>Admission Fee</th>
                            <th>Fee Structure</th>
                        </tr>
                        <?php foreach ($college['courses'] as $course): ?>
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

                    <form action="../college/process_college.php" method="post">
                        <input type="hidden" name="college_id" value="<?= $college_id; ?>">
                        <button type="submit" name="status" class="button1" value="approved">Approve</button>
                        <button type="submit" name="status" class="button2" value="rejected">Reject</button>
                    </form>
                </div>
            </div>
        <?php endforeach; ?>
    <?php else: ?>
        <p>No college data found.</p>
    <?php endif; ?>
</body>
</html>
