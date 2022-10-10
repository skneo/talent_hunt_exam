<?php
session_start();
// if (!isset($_SESSION['loggedin'])) {
//     header('Location: index.php');
// }
function validateInput($data)
{
    $data = trim($data);
    $data = stripslashes($data);
    $data = htmlspecialchars($data);
    return $data;
}
?>
<!doctype html>
<html lang='en'>

<head>
    <meta charset='utf-8'>
    <meta name='viewport' content='width=device-width, initial-scale=1'>
    <!-- Bootstrap CSS -->
    <link href='https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css' rel='stylesheet' integrity='sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3' crossorigin='anonymous'>
    <title>Admit Card</title>
</head>

<body>
    <?php
    include 'header.php';
    if (isset($_POST['student_name'])) {
        $school = validateInput($_POST['school']);
        $sch_rol_no = validateInput($_POST['sch_rol_no']);
        $sql = <<<EOF
        SELECT * from applications WHERE school='$school' and school_rol_no='$sch_rol_no';
        EOF;
        include_once 'dbCon.php';
        $ret = $db->query($sql);
        $row = $ret->fetchArray(SQLITE3_ASSOC);
        if ($row) {
            echo "<div class='alert alert-danger' role='alert'>
            Errro! Application with School name $school and School Roll number $sch_rol_no already submitted.
            </div>
            <a href='apply.php' class='btn btn-primary my-3 mx-3'>New Application</a>";
            $db->close();
            exit;
        } else {
            $student_name = validateInput($_POST['student_name']);
            $father_name = validateInput($_POST['father_name']);
            $address = validateInput($_POST['address']);
            $student_class = '10';
            $phone = validateInput($_POST['phone']);
            $email = validateInput($_POST['email']);
            $center = "Rajkiya Madhya Vidhyalaya Mahatha";
            date_default_timezone_set('Asia/Kolkata');
            $curr_date = date('Y-m-d H:i:s');
            $sql = <<<EOF
            INSERT INTO applications VALUES (NULL,'$student_name','$father_name','$address','$school','$student_class','$sch_rol_no','$phone','$email','$center',1,'$curr_date');
            EOF;
            // include_once 'dbCon.php';
            $ret = $db->exec($sql);
            if (!$ret) {
                echo $db->lastErrorMsg();
            } else {
                // echo "Records created successfully\n";
            }
            $sql = <<<EOF
            SELECT * FROM applications WHERE exam_rol_no = (SELECT MAX(exam_rol_no) FROM applications);
            EOF;
            // select last_insert_rowid();
            $ret = $db->query($sql);
            $row = $ret->fetchArray(SQLITE3_ASSOC);
            $exam_rol_no = $row['exam_rol_no'] + 1000;
            echo "<div class='alert alert-success' role='alert'>
            Application submitted successfully!
            </div>";
            $db->close();
        }
    }
    ?>
    <div class='container my-3'>
        <?php
        if (isset($_POST['student_name'])) {
            echo "<p>Your exam roll number is $exam_rol_no</p>";
        }
        ?>
        <h4>Print Admit Card</h4>
        <form method='POST' action='print_admit_card.php' target="_blank">
            <div class='mb-3'>
                <label for='exam_rol_no' class='form-label float-start'>Exam Roll Number</label>
                <?php
                if (isset($_POST['student_name'])) {
                    echo " <input type='number' class='form-control' id='exam_rol_no' name='exam_rol_no' value='$exam_rol_no' required>";
                } else {
                    echo " <input type='number' class='form-control' id='exam_rol_no' name='exam_rol_no' required>";
                }
                ?>
                <small class='form-text text-muted'>4 digit exam roll number</small>
            </div>
            <button type='submit' class='btn btn-primary'>Print Admit Card</button>
        </form>
    </div>
    <!-- Option 1: Bootstrap Bundle with Popper -->
    <script src='https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js' integrity='sha384-ka7Sk0Gln4gmtz2MlQnikT1wXgYsOg+OMhuP+IlRH9sENBO0LRn5q+8nbTov4+1p' crossorigin='anonymous'></script>
</body>

</html>
