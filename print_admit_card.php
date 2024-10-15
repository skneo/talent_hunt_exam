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
        <div class="border px-5 pb-5">
            <div class="text-center my-5" style="font-family: 'Young Serif', serif;">
                <h3>Talent Hunt Exam 2024</h3>
                <h4>Kendra Mahatha Ladania</h4>
                <h5 class="mt-3 fw-bold">Admit Card</h5>
            </div>
            <div class="row mb-5">
                <div class="col-9">
                    <p><b>Student Name:</b> <?php echo $row['student_name'] ?></p>
                    <p><b>Exam Roll Number:</b> <?php echo $exam_rol_no ?></p>
                    <p><b>Exam Center:</b> Rajkiya Madhya Vidyalaya, Gram Mahatha
                    </p>
                    <p><b>Exam Date:</b> 03 November, 2024</p>
                    <p><b>Reporting Time:</b> 09:30 AM</p>
                    <p><b>Exam Time:</b> 09:45 AM</p>
                    <p><b>Identification Mark:</b> <?php echo $row['id_mark'] ?></p>
                </div>
                <div class="col-3">
                    <label class='mb-2 fw-bold'>Candidate's Photo</label>
                    <img src="images/candidates/<?php echo $row['photo'] ?>" alt="candidates photo" class='border rounded' id='photo' width="105" height="135px" style="display: block;">
                </div>
            </div>
            <div class="mt-3">
                <h5>Important instructions</h5>
                <ul>
                    <li>Any type of electronic gadget like smartphone, smart watches, bluetooth devices etc. are not allowed in examination hall</li>
                    <li>Bring your admit card to examination center</li>
                    <li>Bring Aadhar Card to examination center for identification</li>
                </ul>
                <div class='text-muted mt-5 small'>
                    <h5>Sponsors</h5>
                    <ul>
                        <li>M/s RBS & Associates Tax Consultants</li>
                        <li>Jitendta Pustak Bhandar Ladhaniya</li>
                        <li>Sri Card and Computer Centre Ladhaniya</li>
                        <li>Raj Stationary Ladhaniya</li>
                        <li>Excellent Biology Classes Darbhanga</li>
                        <li>Raja Motor Garage Ladhaniya</li>
                        <li>Matrixe Code Innovations ( matrixe.in ), provides affordable school software</li>
                    </ul>
                </div>
            </div>
        </div>
        <center class="mt-3 printbtn">
            <button onclick="window.print()">Print</button>
        </center>
    </div>
    <style>
        @media print {
            .printbtn {
                display: none;
            }
        }
    </style>
    <!-- Option 1: Bootstrap Bundle with Popper -->
    <script src='https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js' integrity='sha384-ka7Sk0Gln4gmtz2MlQnikT1wXgYsOg+OMhuP+IlRH9sENBO0LRn5q+8nbTov4+1p' crossorigin='anonymous'></script>
</body>

</html>