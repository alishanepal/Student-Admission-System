<?php

require '../connection.php';
include "collegetemplate.php";

$userID = $_SESSION['userid'];

// Fetch data from colleges and their associated courses
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
    WHERE user_id = '$userID'
"; 

$results = mysqli_query($con, $query);

if (mysqli_num_rows($results) > 0) {
    $previous_college_id = null;
    while ($row = mysqli_fetch_assoc($results)) {
        $college_id = $row['college_id'];
        $relationID = $row['relation_id'];

        if ($college_id !== $previous_college_id) {
            if ($previous_college_id !== null) {
                echo '</table>';
                echo '</div>';
                echo '</div>'; // Move the closing tags here to close the previous college details
            }
            echo '<div class="college">';
            echo '<div class="college-details" id="college-details-college' . $college_id . '">';
            echo '<h2>' . $row['college_name'] . '</h2>';
            echo '<p>Address: ' . $row['address'] . '</p>';
            echo '<p>Phone Number: ' . $row['phone_number'] . '</p>';
            echo '<p>Email: ' . $row['email'] . '</p>';
            echo '<p>Establishment Date: ' . $row['establishment_date'] . '</p>';
            echo '<h2>Facilities</h2>';
            echo '<p>Campus Size: ' . $row['campus_size'] . '</p>';
            echo '<p>Number of Classrooms: ' . $row['number_of_classrooms'] . '</p>';
            echo '<p>Number of Labs: ' . $row['number_of_labs'] . '</p>';
            echo '<p>Number of Libraries: ' . $row['number_of_libraries'] . '</p>';
            echo '<p>Number of Hostels: ' . $row['number_of_hostels'] . '</p>';
            echo '<button class="button"><a class=updateBtn href="addCourses.php?addid=' . $college_id . '">ADD courses</a></button>';
            
            echo '<table>';
            echo '<tr><th>Course Code</th><th>Course Name</th><th>Begins At</th><th>Duration</th><th>Admission Fee</th><th>Fee Structure</th><th>Actions</th></tr>';
        }

        echo '<tr>';
        echo '<td>' . $row['course_code'] . '</td>';
        echo '<td>' . $row['course_name'] . '</td>';
        echo '<td>' . $row['begins_at'] . '</td>';
        echo '<td>' . $row['duration'] . '</td>';
        echo '<td>' . $row['admission_fee'] . '</td>';
        echo '<td>' . $row['fee_structure'] . '</td>';
        echo '<td>';
        echo '<button class="button1"><a class="updateBtn" href="editCourses.php?updateid=' . $relationID . '"> Edit</a></button>';
        echo '<button class="button2"><a class="deleteBtn"href="deleteCourses.php?deleteid=' . $relationID . '">Delete</a></button>';
        echo '</td>';
        echo '</tr>';

        $previous_college_id = $college_id;
    }

    // Close the last college details
    if ($previous_college_id !== null) {
        echo '</table>';
        echo '</div>';
        echo '</div>';
    }

    mysqli_close($con);
} else {
    echo '<p>No college data found.</p>';
}

?>
