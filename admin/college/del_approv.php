<?php
require('../../connection.php');
session_start();

// Check if the form is submitted
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    // Check if the index and action values are set
    if (isset($_POST['index']) && isset($_POST['action'])) {
        $index = $_POST['index'];
        $action = $_POST['action'];

        // Retrieve stored records from the session
        $records = $_SESSION['records'] ?? [];

        // Perform the corresponding action based on the button clicked
        if ($action === 'delete') {
            // Delete the record
            if (isset($records[$index])) {
                unset($records[$index]);
            }
        } elseif ($action === 'approve') {
            // Example: Update the status of the record
            if (isset($records[$index])) {
                $record = $records[$index];

                // Insert into colleges
                $query1 = "INSERT INTO `colleges` (`college_name`, `address`, `phone_number`, `email`, `establishment_date`, `college_type`, `authority_name`,`user_id`) 
                           VALUES ('$record[collegeName]', '$record[address]', '$record[phoneNumber]', '$record[email]', '$record[establishmentDate]', '$record[collegeType]', '$record[authorityName]','{$_SESSION['userid']}')";

                // Execute the query
                if (mysqli_query($con, $query1)) {
                    $college_id = mysqli_insert_id($con);

                    // Insert into facilities
                    $query2 = "INSERT INTO `facilities` (`college_id`, `campus_size`, `number_of_classrooms`, `number_of_labs`, `number_of_libraries`, `number_of_hostels`) 
                               VALUES ('$college_id', '$record[campusSize]', '$record[classrooms]', '$record[laboratories]', '$record[library]', '$record[hostel]')";

                    mysqli_query($con, $query2);

                    // Insert the courses associated with the college
                    $courseRecords = $record['courses'];
                    foreach ($courseRecords as $courseRecord) {
                        $courseCode = $courseRecord['courseCode'];
                        $courseName = $courseRecord['courseName'];
                        $beginsAt = $courseRecord['beginsAt'];
                        $duration = $courseRecord['duration'];
                        $admissionFee = $courseRecord['admissionFee'];
                        $feeStructure = $courseRecord['feeStructure'];

                        // Check if the course with the given course code already exists
                        $query = "SELECT * FROM `courses` WHERE `course_code` = '$courseCode'";
                        $result = mysqli_query($con, $query);

                        if (mysqli_num_rows($result) > 0) {
                            // Course already exists, retrieve its course_id
                            $row = mysqli_fetch_assoc($result);
                            $course_id = $row['course_id'];
                        } else {
                            // Course doesn't exist, insert it into the courses table
                            $query = "INSERT INTO `courses` (`course_code`, `course_name`) 
                            VALUES ('$courseCode', '$courseName')";
                            mysqli_query($con, $query);

                            // Retrieve the newly inserted course's course_id
                            $course_id = mysqli_insert_id($con);
                        }

                        // Insert into course_coll_relation
                        $query4 = "INSERT INTO `course_coll_relation` (`begins_at`, `duration`, `admission_fee`, `fee_structure`, `college_id`, `course_id`) 
                                   VALUES ('$beginsAt', '$duration', '$admissionFee', '$feeStructure', '$college_id', '$course_id')";

                        mysqli_query($con, $query4);
                    }
                } else {
                    echo "Error inserting record: " . mysqli_error($con);
                }
            }
        }

        // Store the updated records back in the session
        $_SESSION['records'] = $records;
    }
}

// Redirect back to the display page
header('Location: ../admin/applications.php');
exit;
?>