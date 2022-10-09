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
    <title>All Applications</title>
</head>

<body>
    <?php
    include 'header.php';
    if (isset($_GET['delete_application'])) {
        $delete_application = $_GET['delete_application'];
        $rol_no = $delete_application + 1000;
        $sql = <<<EOF
        DELETE from applications where exam_rol_no = '$delete_application';
        EOF;
        $ret = $db->exec($sql);
        if (!$ret) {
            // echo $db->lastErrorMsg();
        } else {
            echo "<div class='alert alert-success' role='alert'>
            Application of Roll number $rol_no deleted successfully!
            </div>";
        }
    }
    ?>
    <div class='container-fluid my-3'>
        <h4>All Applications</h4>
        <div class="my-3 container-fluid">
            <table id="table_id" class="table-light table table-striped table-bordered w-100">
                <thead>
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
                        <th>Center</th>
                        <th>Applied On</th>
                        <th>Action</th>
                    </tr>
                </thead>
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
                            "<td>" . $row['center'] . "</td>" .
                            "<td>" . $row['applied_on'] . "</td>" .
                            "<td>" . "<a href='all_applications.php?delete_application=" . $row['exam_rol_no'] . "' class='btn btn-danger btn-sm' onclick=\"return confirm('Sure to delete application of Roll no $exam_rol_no?')\">Delete</a>" . "</td>" .
                            "</tr>";
                    }
                    $db->close();
                    ?>
                </tbody>

            </table>
            <!-- for data table -->
            <script src="https://code.jquery.com/jquery-3.5.1.js"> </script>
            <script src="https://cdn.datatables.net/1.11.3/js/jquery.dataTables.min.js"> </script>
            <link href="https://cdn.datatables.net/1.11.3/css/jquery.dataTables.min.css" rel="stylesheet">
            <script>
                $(document).ready(function() {
                    $('#table_id').DataTable({
                        "scrollX": true
                    });
                });
            </script>
        </div>
    </div>
    <!-- Option 1: Bootstrap Bundle with Popper -->
    <script src='https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js' integrity='sha384-ka7Sk0Gln4gmtz2MlQnikT1wXgYsOg+OMhuP+IlRH9sENBO0LRn5q+8nbTov4+1p' crossorigin='anonymous'></script>
</body>

</html>