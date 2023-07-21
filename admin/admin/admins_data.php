<?php
require('../../connection.php');

function fetchAdminData($con)
{
    $query = "SELECT * FROM `admin_login`";
    $result = mysqli_query($con, $query);

    $output = '';
    while ($row = mysqli_fetch_assoc($result)) {
        $adminId = $row['admin_id'];
        $output .= "<tr>";
        $output .= "<td>{$row['fullname']}</td>";
        $output .= "<td>{$row['username']}</td>";
        $output .= "<td>{$row['email']}</td>";
        $output .= "<td>";
        $output .= "<a href='updateAdmin.php?id={$adminId}' class='button'>Update</a>";
        $output .= "<a href='deleteAdmin.php?id={$adminId}' class='button'>Delete</a>";
        $output .= "</td>";
        $output .= "</tr>";
    }

    return $output;
}

?>

<body>
    <!-- HTML and other code -->

    <table>
        <thead>
            <tr>
                <th>Full Name</th>
                <th>Username</th>
                <th>Email</th>
                <th>Action</th>
            </tr>
        </thead>
        <tbody>
            <?php echo fetchAdminData($con); ?>
        </tbody>
    </table>

    <!-- JavaScript and other code -->
</body>
