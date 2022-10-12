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
    if (!isset($_GET['exam_rol_no'])) {
        exit("Error");
    }
    if ($_GET['exam_rol_no'] >= 1000) {
        $exam_rol_no = $_GET['exam_rol_no'] - 1000;
        $sql = <<<EOF
        SELECT * from applications WHERE exam_rol_no='$exam_rol_no' ;
        EOF;
        include 'dbCon.php';
        $ret = $db->query($sql);
        $row = $ret->fetchArray(SQLITE3_ASSOC);
        if (!$row) {
            echo "Roll number " . $_GET['exam_rol_no'] . " does not exist";
            $db->close();
            exit;
        }
        $exam_rol_no = $row['exam_rol_no'] + 1000;
        $db->close();
    } else {
        echo "Roll number " . $_GET['exam_rol_no'] . " does not exist";
        exit;
    }
    ?>
    <div class='container my-3'>
        <h3 class="mb-3">Detail of Roll no <?php echo $exam_rol_no ?></h3>
        <p><b>NAME:</b> <?php echo $row['student_name'] ?></p>
        <p><b>FATHER NAME:</b> <?php echo $row['father_name'] ?></p>
        <p><b>ADDRESS: </b> <?php echo $row['address'] ?></p>
        <p><b>SCHOOL: </b> <?php echo $row['school'] ?></p>
        <p><b>CLASS: </b> 10</p>
        <p><b>SCHOOL ROLL NO:</b> <?php echo $row['school_rol_no'] ?></p>
        <p><b>PHONE:</b> <?php echo $row['parents_phone'] ?></p>
        <p><b>EMAIL:</b> <?php echo $row['email'] ?></p>
    </div>
    <!-- Option 1: Bootstrap Bundle with Popper -->
    <script src='https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js' integrity='sha384-ka7Sk0Gln4gmtz2MlQnikT1wXgYsOg+OMhuP+IlRH9sENBO0LRn5q+8nbTov4+1p' crossorigin='anonymous'></script>
</body>

</html>