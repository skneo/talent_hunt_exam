<?php
session_start();
if (!isset($_SESSION['loggedin'])) {
    header('Location: index.php');
    exit;
}
include 'dbCon.php';
?>
<!doctype html>
<html lang='en'>

<head>
    <meta charset='utf-8'>
    <meta name='viewport' content='width=device-width, initial-scale=1'>
    <!-- Bootstrap CSS -->
    <link href='https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css' rel='stylesheet' integrity='sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3' crossorigin='anonymous'>
    <title>All Applications CSV</title>
</head>

<body>
    <?php
    include 'header.php';
    ?>
    <div class='container-fluid my-3'>
        <div class="d-flex">
            <h4 class="me-5">All Applications</h4>
            <button type="button" class="btn btn-primary btn-sm ms-5" id='tableexport'>Download Table</button>
        </div>
        <div class="my-3 container-fluid">
            <table id="table_id" class="table-light table table-striped table-bordered w-100">
                <!-- <thead> -->
                <tr>
                    <th>Exam Roll No</th>
                    <th>Student Name</th>
                    <th>Father Name</th>
                    <th>Address</th>
                    <th>School</th>
                    <th>Class</th>
                    <th>School Roll No</th>
                    <th>Parent's Phone</th>
                    <th>Email</th>
                </tr>
                <!-- </thead> -->
                <tbody>
                    <?php
                    // include 'dbCon.php';
                    $sql = <<<EOF
                    SELECT * from applications;
                    EOF;
                    $ret = $db->query($sql);
                    while ($row = $ret->fetchArray(SQLITE3_ASSOC)) {
                        $exam_rol_no = 1000 + $row['exam_rol_no'];
                        echo "<tr>" .
                            "<td>" .  $exam_rol_no . "</td>" .
                            "<td>" . $row['student_name'] . "</td>" .
                            "<td>" . $row['father_name'] . "</td>" .
                            "<td>" . $row['address'] . "</td>" .
                            "<td>" . $row['school'] . "</td>" .
                            "<td>" . $row['class'] . "</td>" .
                            "<td>" . $row['school_rol_no'] . "</td>" .
                            "<td>" . $row['parents_phone'] . "</td>" .
                            "<td>" . $row['email'] . "</td>" .
                            "</tr>";
                    }
                    $db->close();
                    ?>
                </tbody>
            </table>
            <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>
            <script src="table2csv.min.js"></script>
            <script>
                $('#tableexport').click(function() {
                    $("table").first().table2csv();
                });
            </script>
        </div>
    </div>
    <!-- Option 1: Bootstrap Bundle with Popper -->
    <script src='https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js' integrity='sha384-ka7Sk0Gln4gmtz2MlQnikT1wXgYsOg+OMhuP+IlRH9sENBO0LRn5q+8nbTov4+1p' crossorigin='anonymous'></script>
</body>

</html>