<?php
include '../connection.php';

if (isset($_GET['student_id'])) {
    $studentID = $_GET['student_id'];

    // Delete records from family_details, educational_background, and extended_details tables
    $deleteFamilyQuery = "DELETE FROM family_details WHERE student_id = '$studentID'";
    $deleteEducationalQuery = "DELETE FROM educational_background WHERE student_id = '$studentID'";
    $deleteExtendedQuery = "DELETE FROM extended_details WHERE student_id = '$studentID'";

    $deleteFamilyResult = mysqli_query($con, $deleteFamilyQuery);
    $deleteEducationalResult = mysqli_query($con, $deleteEducationalQuery);
    $deleteExtendedResult = mysqli_query($con, $deleteExtendedQuery);

    if ($deleteFamilyResult && $deleteEducationalResult && $deleteExtendedResult) {
        // All related records deleted successfully, proceed to delete from students table
        $deleteStudentQuery = "DELETE FROM students WHERE student_id = '$studentID'";
        $deleteStudentResult = mysqli_query($con, $deleteStudentQuery);

        if ($deleteStudentResult) {
            echo "
<script>
alert('Form DEleted successfully');
window.location.href='studentDashboard.php';
</script>";
        } else {          
              echo "
            <script>
            alert('Error deleting application');
            window.location.href='studentDashboard.php';
            </script>";
            exit();
        }
    } else {
        echo "
        <script>
        alert('Error deleting application');
        window.location.href='studentDashboard.php';
        </script>"; exit();
    }
}
?>
