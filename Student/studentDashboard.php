<?php
include '../connection.php';
include 'studenTemplate.php';

// Get the user ID from the session
$userId = $_SESSION['userid'];

// SQL query to join the tables and fetch the required columns, including student_id
$query = "SELECT 
              s.student_id, s.full_name, s.email, s.phone_number, c.college_name, co.course_name, s.status
          FROM 
              students s
          JOIN 
              courses co ON s.course_id = co.course_id
          JOIN 
              colleges c ON s.college_id = c.college_id
          WHERE 
              s.user_id = $userId";

$result = mysqli_query($con, $query);

?>

<!DOCTYPE html>
<html>
<head>
    <title>Student Information</title>
</head>
<body>
    <h1>Student Information</h1>
    <?php
    // Check if there is any data in the result
    if (mysqli_num_rows($result) > 0) {
    ?>
    <table border="1">
        <tr>
            <th>Full Name</th>
            <th>Email</th>
            <th>Phone Number</th>
            <th>College Name</th>
            <th>Course Name</th>
            <th>Status</th>
            <th>Action</th>
        </tr>
        <?php
        while ($row = mysqli_fetch_assoc($result)) {
            echo "<tr>";
            echo "<td>{$row['full_name']}</td>";
            echo "<td>{$row['email']}</td>";
            echo "<td>{$row['phone_number']}</td>";
            echo "<td>{$row['college_name']}</td>";
            echo "<td>{$row['course_name']}</td>";
            
            // Apply color based on status
            $statusColor = '';
            if ($row['status'] === 'pending') {
                $statusColor = 'yellow';
            } elseif ($row['status'] === 'approved') {
                $statusColor = 'green';
            } elseif ($row['status'] === 'reject') {
                $statusColor = 'red';
            }
            
            // Output status with color
            echo "<td style='color: $statusColor;'>{$row['status']}</td>";
            
            // View Detail link
            echo "<td><a href='viewDetails.php?student_id={$row['student_id']}'>View Detail</a></td>";
            
            echo "</tr>";
        }
        ?>
    </table>
    <?php
    } else {
        // Display message when no data is available
        echo "You haven't submitted the form.";
    }
    ?>
</body>
</html>

<?php
// Close the database connection
mysqli_close($con);
?>
