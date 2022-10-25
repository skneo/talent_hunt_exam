<?php
function validateInput($data)
{
    $data = trim($data);
    $data = stripslashes($data);
    $data = htmlspecialchars($data);
    return $data;
}
if (!isset($_POST['exam_rol_no'])) {
    exit("Error");
}
if ($_POST['exam_rol_no'] >= 1000) {
    $exam_rol_no = validateInput($_POST['exam_rol_no']) - 1000;
    $sql = <<<EOF
    SELECT * from applications WHERE exam_rol_no='$exam_rol_no' ;
    EOF;
    include 'dbCon.php';
    $ret = $db->query($sql);
    $row = $ret->fetchArray(SQLITE3_ASSOC);
    if (!$row) {
        echo "Roll number " . $_POST['exam_rol_no'] . " does not exist";
        $db->close();
        exit;
    }
    $exam_rol_no = $row['exam_rol_no'] + 1000;
    $db->close();
} else {
    echo "Roll number " . $_POST['exam_rol_no'] . " does not exist";
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
    <title><?php echo $exam_rol_no . " Talent Hunt Admit Card" ?> </title>
</head>

<body>
    <div class='container my-3' style="min-width: 700px;">
        <div class="border ">
            <div class="text-center my-5">
                <h3>Talent Hunt Exam 2022</h3>
                <h4>Kendra Mahatha Ladania</h4>
                <h5 class="mt-3"><u>Admit Card</u></h5>
            </div>
            <div class="ms-5 mb-5">
                <p><b>Student Name:</b> <?php echo strtoupper($row['student_name']) ?></p>
                <p><b>Exam Roll Number:</b> <?php echo $exam_rol_no ?></p>
                <p><b>Exam Center:</b> Rajkiya Madhya Vidhyalaya Mahatha</p>
                <p><b>Exam Date:</b> 26 October, 2022</p>
                <p><b>Exam Time:</b> 09:30 AM</p>
            </div>
        </div>
        <center class="mt-3">
            <!--    <button onclick="window.print()">Print</button> -->
        </center>
    </div>
    <script> 
        function printPage(){
            // Do print the page
            if (typeof(window.print) != 'undefined') {
               window.print();
            }
        }
        window.load=printPage();
    </script>
    <!-- Option 1: Bootstrap Bundle with Popper -->
    <script src='https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js' integrity='sha384-ka7Sk0Gln4gmtz2MlQnikT1wXgYsOg+OMhuP+IlRH9sENBO0LRn5q+8nbTov4+1p' crossorigin='anonymous'></script>
</body>

</html>
