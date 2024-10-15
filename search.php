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
    <title>Search</title>
</head>

<body>
    <?php
    include 'header.php';

    ?>
    <div class='container my-3'>
        <span>
            <h4>In case you forgot your roll number, Search Roll number</h4>
        </span>
        <form method='POST' action='' class="mt-3">
            <div class='mb-3'>
                <label for='phone' class='form-label float-start'>Parent's Phone</label>
                <input type='text' class='form-control' id='phone' name='phone'>
            </div>
            <p>or</p>
            <div class='mb-3'>
                <label for='email' class='form-label float-start'>Email</label>
                <input type='text' class='form-control' id='email' name='email'>
            </div>
            <button type='submit' class='btn btn-primary'>Search</button>
        </form>
        <?php
        if (isset($_POST['phone'])) {
            $phone = validateInput($_POST['phone']);
            $email = validateInput($_POST['email']);
            if ($email == '') {
                $sql = <<<EOF
                SELECT * from applications WHERE parents_phone='$phone' ;
                EOF;
            } else {
                $sql = <<<EOF
                SELECT * from applications WHERE email='$email' ;
                EOF;
            }
            include 'dbCon.php';
            $ret = $db->query($sql);

            echo "<h4 class='mt-5'>Search results </h4>
            <table id='table_id' class='table-light table table-striped table-bordered w-100'>
            <thead>
                <tr>
                    <th>Exam Roll No</th>
                    <th>Student Name</th>
                    <th>Father Name</th>
                    <th>School</th>
                    <th>School Roll No</th>
                </tr>
            </thead>
            <tbody>";

            while ($row = $ret->fetchArray(SQLITE3_ASSOC)) {
                $exam_rol_no = 20241000 + $row['exam_rol_no'];
                echo "<tr>" .
                    "<td><a href='view_admit_card.php?exam_rol_no=$exam_rol_no'>$exam_rol_no</a></td>" .
                    "<td>" . $row['student_name'] . "</td>" .
                    "<td>" . $row['father_name'] . "</td>" .
                    "<td>" . $row['school'] . "</td>" .
                    "<td>" . $row['school_rol_no'] . "</td>" .
                    "</tr>";
            }
            $db->close();

            echo "</tbody>

        </table>";
        }
        ?>
    </div>
    <?php include 'footer.php'; ?>
    <!-- Option 1: Bootstrap Bundle with Popper -->
    <script src='https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js' integrity='sha384-ka7Sk0Gln4gmtz2MlQnikT1wXgYsOg+OMhuP+IlRH9sENBO0LRn5q+8nbTov4+1p' crossorigin='anonymous'></script>
</body>

</html>