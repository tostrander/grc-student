<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>GRC Student</title>
    <link rel="stylesheet" href="//stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" >
</head>
<body>

    <div class="container">
    <h3>Add a New Student</h3>

    <form id="student-form" action="add-student.php" method="post">

        <div class="form-group">
            <label for="sid">SID</label>
            <input type="text" class="form-control"
                   id="sid" name="sid">
        </div>
        <div class="form-group">
            <label for="firstName">First name</label>
            <input type="text" class="form-control"
                   id="firstName" name="firstName">
        </div>
        <div class="form-group">
            <label for="lastName">Last name</label>
            <input type="text" class="form-control"
                   id="lastName" name="lastName">
        </div>
        <div class="form-group">
            <label for="birthdate">Birthdate</label>
            <input type="text" class="form-control"
                   id="birthdate" name="birthdate">
        </div>
        <div class="form-group">
            <label for="gpa">GPA</label>
            <input type="text" class="form-control"
                   id="gpa" name="gpa">
        </div>
        <div class="form-group">
            <label for="advisor">Advisor</label>
            <select id="advisor" name="advisor">
                <option id="none">--Select--</option>
                <?php
                    //UPDATE THIS WITH YOUR OWN CONNECT PATH!
                    require ('/home/tostrand/connect.php');
                    $sql = 'SELECT * FROM advisor';
                    $result = mysqli_query($cnxn, $sql);
                    while ($row = mysqli_fetch_assoc($result)) {
                        $id = $row['advisor_id'];
                        $first = $row['advisor_first'];
                        $last = $row['advisor_last'];
                        echo "<option value='$id'>$last, $first</option>";
                    }
                ?>
            </select>
        </div>
        <button id="submit" type="submit" class="btn btn-primary">
            Submit
        </button>

    </form>
    </div>

    <script src="//code.jquery.com/jquery-3.3.1.slim.min.js"></script>
    <script src="//cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js"></script>
    <script src="//stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js"></script>

</body>
</html>
