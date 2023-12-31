

    <?php
    require '../connection.php';
    include "collegetemplate.php";

    if (isset($_SESSION['userid'])) {
        $userID = $_SESSION['userid'];

        // Retrieve college data using the college's user_id
        $query_college = "SELECT * FROM colleges WHERE user_id = '$userID'";
        $result_college = mysqli_query($con, $query_college);

        // Check if the college exists and fetch its college_id
        if (mysqli_num_rows($result_college) == 1) {
            $college_row = mysqli_fetch_assoc($result_college);
            $college_id = $college_row['college_id'];

            $query = "
            SELECT 
                s.*, 
                fd.*, 
                eb.*, 
                ed.*,
                c.course_name
            FROM students AS s
            JOIN family_details AS fd ON s.student_id = fd.student_id
            JOIN educational_background AS eb ON s.student_id = eb.student_id
            JOIN extended_details AS ed ON s.student_id = ed.student_id
            JOIN courses AS c ON s.course_id=c.course_id
            WHERE s.college_id = '$college_id' AND s.status = 'approved'";

            $result = mysqli_query($con, $query);  

            if ($result && mysqli_num_rows($result) > 0) {
                $students = mysqli_fetch_all($result, MYSQLI_ASSOC);
            }

            mysqli_close($con);
        }
    }
    ?>
     <h1>Student Information</h1>
    <?php if (isset($students) && count($students) > 0): ?>
        <?php foreach ($students as $student): ?>
           
            <h2>
                <span class="toggle-data" onclick="toggleData('data-<?= $student['student_id']; ?>')">&#9658;</span>
                <?= $student['full_name']; ?>
            </h2>
            <div id="data-<?= $student['student_id']; ?>" style="display: none;">
        
        <h2>Basic Information</h2>
        <p>Full Name: <?php echo $student['full_name']; ?></p>
        <p>Birth Date: <?php echo $student['birth_date']; ?></p>
        <p>Email: <?php echo $student['email']; ?></p>
        <p>Phone Number: <?php echo $student['phone_number']; ?></p>
        <p>Gender: <?php echo $student['gender']; ?></p>
        <p>Post Code: <?php echo $student['post_code']; ?></p>
        <p>course name: <?php echo $student['course_name']; ?></p>
    
        <h2>Family Details</h2>
        <p>Father's Name: <?php echo $student['father_name']; ?></p>
        <p>Father's Occupation: <?php echo $student['father_occupation']; ?></p>
        <p>Father's Address: <?php echo $student['father_address']; ?></p>
        <p>Father's Mobile: <?php echo $student['father_mobile']; ?></p>
        <p>Father's Email: <?php echo $student['father_email']; ?></p>
        <p>Mother's Name: <?php echo $student['mother_name']; ?></p>
        <p>Mother's Occupation: <?php echo $student['mother_occupation']; ?></p>
        <p>Mother's Address: <?php echo $student['mother_address']; ?></p>
        <p>Mother's Mobile: <?php echo $student['mother_mobile']; ?></p>
        <p>Mother's Email: <?php echo $student['mother_email']; ?></p>
        <!-- Display other family details fields -->
    
        <h2>Educational Background</h2>
        <p>Highest Qualification: <?php echo $student['highest_qualification']; ?></p>
        <p>Institute Name: <?php echo $student['institute_name']; ?></p>
        <p>Year of Passing: <?php echo $student['year_of_passing']; ?></p>
     
    
        <h2>Extended Details</h2>
        <p>Advertisement Source: <?php echo $student['advertisement_source']; ?></p>
        <p>Special Needs: <?php echo $student['special_needs']; ?></p>
        <p>Special Needs Description: <?php echo $student['special_needs_description']; ?></p>
        <p>Reasons for Application: <?php echo $student['reasons_for_application']; ?></p>
 
        </div>

        <?php endforeach; ?>
        <?php else: ?>
        <p>No new application.</p>
        <?php endif; ?>
        <style>
            .toggle-data {
    cursor: pointer;
}

            </style>

        <script>
    function toggleData(dataId) {
        var dataElement = document.getElementById(dataId);
        if (dataElement.style.display === 'none') {
            dataElement.style.display = 'block';
        } else {
            dataElement.style.display = 'none';
        }
    }
</script>

    </body>
    </html>
      