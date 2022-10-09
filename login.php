<?php
session_start();
if (isset($_SESSION['loggedin'])) {
    header('Location: index.php');
    exit;
}
function validateInput($data)
{
    $data = trim($data);
    $data = stripslashes($data);
    $data = htmlspecialchars($data);
    return $data;
}
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    include 'dbCon.php';
    $username = validateInput($_POST['username']);
    $password = validateInput($_POST['password']);
    $sql = <<<EOF
        SELECT * from users WHERE username='$username' AND password='$password' ;
        EOF;
    $ret = $db->query($sql);
    $row = $ret->fetchArray(SQLITE3_ASSOC);
    if ($row != false) {
        if ($row['username'] == $username and $row['password'] == $password) {
            $_SESSION['loggedin'] = true;
            $_SESSION['username'] = $username;
            header('Location: index.php');
            exit;
        } else {
            echo "<div id='loginAlert' class='alert alert-danger alert-dismissible fade show py-2' role='alert'>
                <strong>Login failed! Wrong Credentials. </strong>
                <button type='button' class='btn-close pb-2' data-bs-dismiss='alert' aria-label='Close'></button>
            </div>";
        }
    } else {
        echo "<div id='loginAlert' class='alert alert-danger alert-dismissible fade show py-2' role='alert'>
                <strong>Login failed! Wrong Credentials. </strong>
                <button type='button' class='btn-close pb-2' data-bs-dismiss='alert' aria-label='Close'></button>
            </div>";
    }
    $db->close();
}
?>
<!doctype html>
<html lang='en'>

<head>
    <meta charset='utf-8'>
    <meta name='viewport' content='width=device-width, initial-scale=1'>
    <!-- Bootstrap CSS -->
    <link href='https://cdn.jsdelivr.net/npm/bootstrap@5.0.0/dist/css/bootstrap.min.css' rel='stylesheet' integrity='sha384-wEmeIV1mKuiNpC+IOBjI7aAzPcEZeedi5yW5f2yOq55WWLwNGmvvx4Um1vskeMj0' crossorigin='anonymous'>
    <title>Login </title>
</head>

<body>
    <?php
    include 'header.php';

    ?>
    <div class="text-center mt-5 w-25 container" style="min-width: 300px;">
        <div class="mt-3">
            <img src="images/user.png" alt="user" width="120">
        </div>
        <form action="login.php" method="POST">
            <div class="mb-2 ">
                <label for="username" class="form-label float-start">Username</label>
                <input type="text" name="username" id="username" class="mt-3 form-control" placeholder="Enter username" required>
            </div>
            <div class="mb-3 ">
                <label for="password" class="form-label float-start">Password</label>
                <input type="password" name="password" id="password" class="my-3 form-control" placeholder="Enter password" required>
            </div>
            <button type="submit" class="btn btn-primary px-5 ">Login</button>
        </form>
    </div>
    <!-- Option 1: Bootstrap Bundle with Popper -->
    <script src='https://cdn.jsdelivr.net/npm/bootstrap@5.0.0/dist/js/bootstrap.bundle.min.js' integrity='sha384-p34f1UUtsS3wqzfto5wAAmdvj+osOnFyQFpp4Ua3gs/ZVWx6oOypYoCJhGGScy+8' crossorigin='anonymous'></script>
</body>

</html>