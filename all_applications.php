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
        $sql = <<<EOF
        SELECT * from applications WHERE exam_rol_no='$delete_application' ;
        EOF;
        $ret = $db->query($sql);
        $row = $ret->fetchArray(SQLITE3_ASSOC);
        unlink('images/candidates/' . $row['photo']);
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
        <div class="row">
            <div class="col-md-6">
                <h4>All Applications</h4>
            </div>
            <div class="col-md-6">
                <a href="download_applications.php">Export Table</a>
            </div>
        </div>
        <div class="my-3">
            <table id="table_id" class="table-light table table-striped table-bordered w-100">
                <thead>
                    <tr>
                        <th>Exam Roll No</th>
                        <th style='position:sticky; left:0'>Student Name</th>
                        <th>Father Name</th>
                        <th style="min-width: 200px;">Address</th>
                        <th style="min-width: 200px;">School</th>
                        <th>Coaching</th>
                        <!-- <th>Class</th> -->
                        <th>School Roll No</th>
                        <th>Parent's Phone</th>
                        <th>Email</th>
                        <th>Identification Mark</th>
                        <!-- <th>Center</th> -->
                        <th style="min-width: 150px;">Applied On</th>
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
                            "<td><a href='view_admit_card.php?exam_rol_no=$exam_rol_no'>$exam_rol_no</a></td>" .
                            "<td style='position:sticky; left:0'><a href='roll_no_detail.php?exam_rol_no=$exam_rol_no'>" . $row['student_name'] . "</a></td>" .
                            "<td>" . $row['father_name'] . "</td>" .
                            "<td>" . $row['address'] . "</td>" .
                            "<td>" . $row['school'] . "</td>" .
                            "<td>" . $row['coaching'] . "</td>" .
                            // "<td>" . $row['class'] . "</td>" .
                            "<td>" . $row['school_rol_no'] . "</td>" .
                            "<td>" . $row['parents_phone'] . "</td>" .
                            "<td>" . $row['email'] . "</td>" .
                            "<td>" . $row['id_mark'] . "</td>" .
                            // "<td>" . $row['center'] . "</td>" .
                            "<td>" . $row['applied_on'] . "</td>" .
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
    <?php include 'footer.php'; ?>
    <!-- Option 1: Bootstrap Bundle with Popper -->
    <script src='https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js' integrity='sha384-ka7Sk0Gln4gmtz2MlQnikT1wXgYsOg+OMhuP+IlRH9sENBO0LRn5q+8nbTov4+1p' crossorigin='anonymous'></script>
</body>

</html>