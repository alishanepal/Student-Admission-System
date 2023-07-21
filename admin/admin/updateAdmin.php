<?php
require('../../connection.php');

if (isset($_GET['id'])) {
    $adminId = $_GET['id'];

    // Retrieve the admin record based on the admin_id
    $query = "SELECT * FROM `admin_login` WHERE `admin_id` = '$adminId'";
    $result = mysqli_query($con, $query);
    $admin = mysqli_fetch_assoc($result);

    if ($admin) {
        // The admin record exists
        // Perform the update operation

        // Check if the update form is submitted
        if (isset($_POST['update'])) {
            $fullname = $_POST['fullname'];
            $username = $_POST['username'];
            $email = $_POST['email'];

            // Perform the update query
            $updateQuery = "UPDATE `admin_login` SET 
                            `fullname` = '$fullname',
                            `username` = '$username',
                            `email` = '$email'
                            WHERE `admin_id` = '$adminId'";
            if (mysqli_query($con, $updateQuery)) {
                // Update successful
                // Redirect back to the admin data page
                header("Location: admins_data.php");
                exit;
            } else {
                echo "Failed to update admin. Please try again.";
            }
        }

        // Display the update form
        ?>
        <form method="POST" action="">
            <input type="text" name="fullname" value="<?php echo $admin['fullname']; ?>" required /><br />
            <input type="text" name="username" value="<?php echo $admin['username']; ?>" required /><br />
            <input type="email" name="email" value="<?php echo $admin['email']; ?>" required /><br />
            <button type="submit" name="update">Update</button>
        </form>
        <?php
    } else {
        echo "Admin not found.";
    }
} else {
    echo "Invalid admin ID.";
}
?>
