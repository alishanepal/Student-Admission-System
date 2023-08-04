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
    JOIN courses AS cc ON cr.course_id = cc.course_id
    WHERE c.status = 'pending'"; 

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
}?>
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
            font-size: 1.5em; /* Increase the font size */
        }
    </style>
    <script>
        // Add your JavaScript code here
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

    <?php if (isset($results) && count($college_data) > 0): ?>
        <?php $previous_college_id = null; ?>
        <?php foreach ($results as $result): ?>
            <?php if ($result['college_id'] !== $previous_college_id): ?>
                <?php if ($previous_college_id !== null): ?>
                    </table>
                    <form action="../college/process_college.php" method="post">
                        <input type="hidden" name="college_id" value="<?= $previous_college_id; ?>">
                        <button type="submit" name="status" value="approved">Approve</button>
                        <button type="submit" name="status" value="rejected">Reject</button>
                    </form>
                </div>
                <?php $courseCollData = []; ?>
            <?php endif; ?>
            <div class="college">
                <p>
                    <span class="toggle-symbol" id="symbolcollege<?= $result['college_id']; ?>" onclick="toggleDetails('college<?= $result['college_id']; ?>')">&#9658;</span>
                    <strong><?= $result['college_name']; ?></strong>
                </p>
                <div class="college-details" id="college-details-college<?= $result['college_id']; ?>">
                    <p>Address: <?= $result['address']; ?></p>
                    <p>Phone Number: <?= $result['phone_number']; ?></p>
                    <p>Email: <?= $result['email']; ?></p>
                    <p>Establishment Date: <?= $result['establishment_date']; ?></p>

                    <h2>Facilities</h2>
                    <p>Campus Size: <?= $result['campus_size']; ?></p>
                    <p>Number of Classrooms: <?= $result['number_of_classrooms']; ?></p>
                    <p>Number of Labs: <?= $result['number_of_labs']; ?></p>
                    <p>Number of Libraries: <?= $result['number_of_libraries']; ?></p>
                    <p>Number of Hostels: <?= $result['number_of_hostels']; ?></p>

                    <table>
                        <tr>
                            <th>Course Code</th>
                            <th>Course Name</th>
                            <th>Begins At</th>
                            <th>Duration</th>
                            <th>Admission Fee</th>
                            <th>Fee Structure</th>
                        </tr>
                        <?php $previous_college_id = $result['college_id']; ?>
                    <?php endif; ?>
                    <?php $courseCollData[] = $result; ?>
                <?php endforeach; ?>
                <?php if ($previous_college_id !== null): ?>
                    </table>
                    <form action="../college/process_college.php" method="post">
                        <input type="hidden" name="college_id" value="<?= $previous_college_id; ?>">
                        <button type="submit" name="status" value="approved">Approve</button>
                        <button type="submit" name="status" value="rejected">Reject</button>
                    </form>
                </div>
            <?php endif; ?>
            </div>
    <?php else: ?>
        <p>No college data found.</p>
    <?php endif; ?>
</body>
</html>
