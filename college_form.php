<!DOCTYPE html>
<html>

<head>
    <title>College affiliation Form</title>
    <link rel="stylesheet" href="college_form.css">
    <style>
        <?php include "CSS/college_form.css" ?>
    </style>
</head>

<body>
    <?php include('header.php'); ?>

    <section>
        <form id="collegeAffiliationForm" action="submit.php" method="POST">
            <h1 align="center">College affiliation Form</h1>
            <div class="inform details">
                <span class="title">
                    <h3>College Information</h3>
                </span>
                <div class="info">
                    <div class="info-field">
                        <label for="college">Name of the institution</label>
                        <input type="text" id="college" name="college" required><br><br>

                        <label for="address">Address</label>
                        <input type="text" id="address" name="address" required><br><br>

                        <div class="contact details">
                            <label for="num">Phone Number</label>
                            <input type="number" id="num" name="num" required><br><br>

                            <label for="email">Email Address</label>
                            <input type="email" id="email" name="email" required><br><br>
                        </div>

                        <label for="year">Year of establishment</label>
                        <select>
                            <option value="10">2010</option>
                            <option value="11">2011</option>
                            <option value="12">2012</option>
                            <option value="13">2013</option>
                            <option value="14">2014</option>
                            <option value="15">2015</option>
                            <option value="16">2016</option>
                            <option value="17">2017</option>
                            <option value="18">2018</option>
                            <option value="19">2019</option>
                            <option value="20">2020</option>
                        </select><br><br>

                        <label for="status">Legal status of the college</label>
                        <select name="status" id="name">
                            <option class="1">Private institution</option>
                            <option class="1">Government</option>
                            <option class="1">Non-profit organization</option>
                        </select>
                    </div>

                    <div class="courses">
                        <h2>Courses Provided</h2>
                        <label for="numberOfCourses">Number of Courses:</label>
                        <input type="number" id="numberOfCourses" name="numberOfCourses" min="1" required><br><br>

                        <div id="courseTable"></div>
                    </div>

                    <div class="facility">
                        <h2>Infrastructure and Facilities</h2>

                        <label for="campusSize">Campus Size:</label>
                        <input type="text" id="campusSize" name="campusSize"><br><br>

                        <label for="classrooms">Number of Classrooms:</label>
                        <input type="text" id="classrooms" name="classrooms"><br><br>

                        <label for="laboratories">Number of Laboratories:</label>
                        <input type="text" id="laboratories" name="laboratories"><br><br>

                        <label for="library">Number of Libraries:</label>
                        <input type="text" id="library" name="library"><br><br>

                        <label for="hostel">Number of Hostel:</label>
                        <input type="text" id="hostel" name="hostel"><br>
                    </div>

                    <div class="record details">

                        <h1>Affiliation</h1>
                        <p>The college is affiliated with the following universities and institutions:</p>

                        <label for="affiliation1">Affiliation 1:</label>
                        <input type="text" id="affiliation1" name="affiliation1" required><br>

                        <label for="affiliation2">Affiliation 2:</label>
                        <input type="text" id="affiliation2" name="affiliation2"><br><br>
                    </div>

                    <span class="title">Declaration and Signature</span>
                    <div class="declare details">
                         <p>
                            <label>
                                <input type="checkbox" id="declarationCheckbox" required>
                                I,
                            </label>
                            <input type="text" placeholder="Authorrity_Name" />
                            hereby declare that the information provided in this document is accurate and authentic to
                            the best of my knowledge.
                        </p>
                        <p id="declarationError" style="display: none; color: red;">Please tick the checkbox to proceed.
                        </p>
                        <p>Date: <input type="date" /></p>
                    </div>
                    <input type="submit" value="Submit" onclick="return validateForm()">

        </form>
    </section>

    <script>
        <?php include "form.js" ?>
    </script>
</body>

</html>