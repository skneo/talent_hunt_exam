<?php
session_start();
if (!isset($_SESSION['loggedin'])) {
    header('Location: index.php');
    exit;
}
?>
<!doctype html>
<html lang='en'>

<head>
    <meta charset='utf-8'>
    <meta name='viewport' content='width=device-width, initial-scale=1'>
    <!-- Bootstrap CSS -->
    <link href='https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css' rel='stylesheet' integrity='sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3' crossorigin='anonymous'>
    <title>Roll Number Detail</title>
</head>

<body>
    <?php
    include 'header.php';
    ?>
    <div class='container my-3'>
        <div class="my-3 col-md-4">
            <form class='d-flex me-2 mb-2 mb-md-0' role='search' action='roll_no_detail.php'>
                <div class='input-group'>
                    <input name='exam_rol_no' class='form-control' type='number' aria-label='Search' placeholder='Roll No' required>
                    <button class='btn btn-primary' type='submit'><i class='bi bi-search'></i></button>
                </div>
            </form>
        </div>
        <?php
        if (!isset($_GET['exam_rol_no'])) {
            exit("Error");
        }
        if ($_GET['exam_rol_no'] >= 20241000) {
            $exam_rol_no = $_GET['exam_rol_no'] - 20241000;
            $sql = <<<EOF
        SELECT * from applications WHERE exam_rol_no='$exam_rol_no' ;
        EOF;
            include 'dbCon.php';
            $ret = $db->query($sql);
            $row = $ret->fetchArray(SQLITE3_ASSOC);
            if (!$row) {
                echo "<p class='text-danger'>Roll number " . $_GET['exam_rol_no'] . " does not exist</p>";
                $db->close();
                exit;
            }
            $exam_rol_no = $row['exam_rol_no'] + 20241000;
            $db->close();
        } else {
            echo "<p class='text-danger'>Roll number " . $_GET['exam_rol_no'] . " does not exist</p>";
            exit;
        }
        ?>
        <h3 class="mb-3">Detail of Roll no <?php echo $exam_rol_no ?></h3>
        <div class="row">
            <div class="col-md-4">
                <label class='mb-2 fw-bold'>Candidate's Photo</label>
                <img src="images/candidates/<?php echo $row['photo'] ?>" alt="candidates photo" id='photo' width="105" height="135px" style="display: block;">
                <p class="mt-3"><b>Exam Roll no:</b> <?php echo $exam_rol_no ?></p>
                <p><b>NAME:</b> <?php echo $row['student_name'] ?></p>
                <p><b>FATHER NAME:</b> <?php echo $row['father_name'] ?></p>
            </div>
            <div class="col-md-8">
                <p><b>ADDRESS: </b> <?php echo $row['address'] ?></p>
                <p><b>SCHOOL: </b> <?php echo $row['school'] ?></p>
                <p><b>COACHING: </b> <?php echo $row['coaching'] ?></p>
                <p><b>CLASS: </b> 10</p>
                <p><b>SCHOOL ROLL NO:</b> <?php echo $row['school_rol_no'] ?></p>
                <p><b>PHONE:</b> <?php echo $row['parents_phone'] ?></p>
                <p><b>EMAIL:</b> <?php echo $row['email'] ?></p>
                <p><b>Identi. Mark:</b> <?php echo $row['id_mark'] ?></p>
            </div>
        </div>
        <a href="all_applications.php?delete_application=<?php echo $row['exam_rol_no'] ?>" class="btn btn-outline-danger" onclick="return confirm('Sure to delete ?')">Delete</a>
    </div>
    <?php include 'footer.php'; ?>
    <!-- Option 1: Bootstrap Bundle with Popper -->
    <script src='https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js' integrity='sha384-ka7Sk0Gln4gmtz2MlQnikT1wXgYsOg+OMhuP+IlRH9sENBO0LRn5q+8nbTov4+1p' crossorigin='anonymous'></script>
</body>

</html>