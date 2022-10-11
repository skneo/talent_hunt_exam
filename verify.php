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
    <title>Verify</title>
</head>

<body>
    <?php
    include 'header.php';
    if (isset($_GET['student_name'])) {
        $student_name = validateInput($_GET['student_name']);
        $father_name = validateInput($_GET['father_name']);
        $address = validateInput($_GET['address']);
        $school = validateInput($_GET['school']);
        // $student_class = validateInput($_GET['student_class']);
        $sch_rol_no = validateInput($_GET['sch_rol_no']);
        $phone = validateInput($_GET['phone']);
        $email = validateInput($_GET['email']);
        $form_data = explode('?', $_SERVER['REQUEST_URI'])[1];
    }
    ?>
    <div class='container my-3'>
        <h4 class="mb-3">Verify your data</h4>
        <p><b>NAME:</b> <?php echo $student_name ?></p>
        <p><b>FATHER NAME:</b> <?php echo $father_name ?></p>
        <p><b>ADDRESS: </b> <?php echo $address ?>
        <p><b>SCHOOL: </b> <?php echo $school ?></p>
        <p><b>CLASS: </b> 10</p>
        <p><b>SCHOOL ROLL NO:</b> <?php echo $sch_rol_no ?></p>
        <p><b>PHONE:</b> <?php echo $phone ?></p>
        <p><b>EMAIL:</b> <?php echo $email ?></p>
        <button onclick="history.back()" class="btn btn-primary me-5">Go Back and Edit</button>
        <a href="view_admit_card.php?<?php echo $form_data ?></p>" class="ms-5 btn btn-success" onclick="return confirm('Sure to final submit?')">Final Submit</a>
    </div>
    <!-- Option 1: Bootstrap Bundle with Popper -->
    <script src='https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js' integrity='sha384-ka7Sk0Gln4gmtz2MlQnikT1wXgYsOg+OMhuP+IlRH9sENBO0LRn5q+8nbTov4+1p' crossorigin='anonymous'></script>
</body>

</html>