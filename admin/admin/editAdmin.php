<?php
require('../../connection.php');

if (isset($_GET['id'])) {
    $adminId = $_GET['id'];

    // Retrieve the admin record based on the admin_id
    $query = "SELECT * FROM `admin_login` WHERE `admin_id` = '$adminId'";
    $result = mysqli_query($con, $query);


    
    if (mysqli_num_rows($result) > 0) {
        $adminresult = mysqli_fetch_assoc($result);
            $fullname = $adminresult['fullname'];
            $username = $adminresult['username'];
            $email = $adminresult['email'];
        }}
            ?>
                
<style>
    body {
        display: flex;
        justify-content: center;
        align-items: center;
        height: 100vh;
        margin: 0;
        background-color: #f0f0f0;
    }

    form {
        width:30%;
        height:45%;        ;
        padding: 20px;
        border: 1px solid #ccc;
        border-radius: 10px;
        background-color: #fff;
    }

    label {
        display: block;
        margin-bottom: 5px;
        font-weight: bold;
    }

    input {
        width: 100%;
        padding: 10px;
        margin-bottom: 15px;
        border: 1px solid #ccc;
        border-radius: 5px;
    }

    button {
        display: block;
        margin: 0 auto;
        padding: 10px 20px;
        background-color: #033b06;
        color: #fff;
        border: none;
        border-radius: 5px;
        cursor: pointer;
        transition: background-color 0.3s ease;
    }

    button:hover {
        background-color: #044d07;
    }
</style>

<form method="POST" action="updateAdmin.php">
    <h2>Update</h2>
    <input type="hidden" name="admin_id" value="<?php echo $adminId ?>"required/>

    <label for="fullname">Full Name:</label>
    <input type="text" id="fullname" name="fullname" value="<?php echo $fullname ?>" required />

    <label for="username">Username:</label>
    <input type="text" id="username" name="username" value="<?php echo $username ?>" required />

    <label for="email">Email:</label>
    <input type="email" id="email" name="email" value="<?php echo $email?>" required />

    <button type="submit" name="update">Update</button>
</form>

