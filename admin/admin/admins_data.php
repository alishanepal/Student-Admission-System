<?php
require '../../connection.php';

// Fetch data from the admin_login table
$query = "SELECT *FROM admin_login";
$results = mysqli_query($con, $query);

?>

<link rel="stylesheet" href="../../CSS/buttons.css" />
<h2>Admin Data</h2>

<?php if (mysqli_num_rows($results) > 0): ?>
    <table border="1">
        <tr>
            <th>Full Name</th>
            <th>Username</th>
            <th>Email</th>
            <th>Action</th>
        </tr>
        <?php while ($row = mysqli_fetch_assoc($results)): 
            $id=$row['admin_id'];?>
            <tr>
                <td><?php echo $row['fullname']; ?></td>
                <td><?php echo $row['username']; ?></td>
                <td><?php echo $row['email']; ?></td>
                <td>
    <button class="button1"><a href="editAdmin.php?id=<?php echo $id; ?>" class="updateBtn">Edit</a></button>
    <button class="button2"><a href="deleteAdmin.php?id=<?php echo $id; ?>" class="deleteBtn">Delete</a></button>
</td>

            </tr>
        <?php endwhile; ?>
    </table>
<?php else: ?>
    <p>No data found.</p>
<?php endif; ?>

</body>
</html>

<?php
?>
