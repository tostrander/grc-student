<?php
/** 305/students.php reads students from a database
 *  into a data table
 *  Nov 4, 2019
 */
//Turn on error reporting -- this is critical!
ini_set('display_errors', 1);
error_reporting(E_ALL);
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>GRC Student Summary</title>
    <link rel="stylesheet" href="//stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" >
    <link rel="stylesheet" href="//cdn.datatables.net/1.10.20/css/jquery.dataTables.min.css">
    <link rel="stylesheet" href="//cdn.datatables.net/responsive/2.2.3/css/responsive.dataTables.min.css">
</head>
<body>
<div class="container">
    <h3>Student Summary</h3>

    <?php
    require('/home/tostrand/connect.php');

    //Define the query
    $sql = 'SELECT s.sid, s.first AS student_first, s.last AS student_last, s.gpa, s.birthdate,  
            s.advisor, a.advisor_first, a.advisor_last 
            FROM student s, advisor a 
            WHERE a.advisor_id = s.advisor';
    //Send the query to the database
    $result = mysqli_query($cnxn, $sql);
    //var_dump($result);
    ?>

    <table id="student-table" class="display">
        <thead>
        <tr>
            <th>SID</th>
            <th>Student Name</th>
            <th>GPA</th>
            <th>Birthdate</th>
            <th>Advisor ID</th>
            <th>Advisor Name</th>
        </tr>
        </thead>
        <tbody>

        <?php
        //Print the results
        while ($row = mysqli_fetch_assoc($result)) {
            $sid = $row['sid'];
            $sFirst = $row['student_first'];
            $sLast = $row['student_last'];
            $gpa = $row['gpa'];
            $birthdate = date('m-d-Y', strtotime($row['birthdate']));
            $aid = $row['advisor'];
            $aFirst = $row['advisor_first'];
            $aLast = $row['advisor_last'];
            echo "<tr>
                <td>$sid</td>
                <td>$sLast, $sFirst</td>
                <td>$gpa</td>
                <td>$birthdate</td>
                <td><input type='text' value='$aid' data-sid='$sid' class='aid'></td>
                <td>$aLast, $aFirst</td>
              </tr>";
        }
        ?>

        </tbody>
    </table>

    <a href="new-student.html">Add a new student</a>

</div>

<!-- //*** "SLIM" version of JQuery does not support AJAX! -->
<script src="//code.jquery.com/jquery-3.4.1.min.js"></script>
<script src="//cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js"></script>
<script src="//stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js"></script>
<script src="//cdn.datatables.net/1.10.20/js/jquery.dataTables.min.js"></script>
<script src="//cdn.datatables.net/responsive/2.2.3/js/dataTables.responsive.min.js"></script>

<script>
    //$('#student-table').DataTable();

    $('#student-table').DataTable( {
        responsive: {
            details: {
                display: $.fn.dataTable.Responsive.display.modal( {
                    header: function ( row ) {
                        var data = row.data();
                        //return 'Details for '+data[0]+' '+data[1];
                        return 'Details for '+data[1];
                    }
                } ),
                renderer: $.fn.dataTable.Responsive.renderer.tableAll( {
                    tableClass: 'table'
                } )
            }
        }
    } );

    $('.aid').on('blur', function() {
        alert("aid: " + $(this).val() + ", sid: " + $(this).attr('id'));
        var aid = $(this).val();
        var sid = $(this).attr('data-sid');

        //*** "SLIM" version of JQuery does not support ajax!
        $.post( "updateAdvisor.php", { aid: aid, sid: sid } );

    });
</script>

</body>
</html>