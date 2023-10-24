<?php
session_start();
?>
<!doctype html>
<html lang='en'>

<head>
    <meta charset='utf-8'>
    <meta name='viewport' content='width=device-width, initial-scale=1'>
    <!-- Bootstrap CSS -->
    <link href='https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css' rel='stylesheet' integrity='sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3' crossorigin='anonymous'>
    <title>About</title>
</head>

<body>
    <?php
    include 'header.php';
    ?>
    <div class='container my-3'>
        <center>
            <h3>About Us</h3>
            <img src="images/img1.jpeg" alt="talent" class="mb-3 rounded img-fluid" height="300px">
        </center>
        <p>
            <b>The Talent Hunt Exam</b> is one of the most prestigious exams conducted for school students for class 10th. The exams as the name suggest identifying hidden talent in school children. The organization believes that all children are blessed with unique qualities. Parents must expose their talent, polish it and present it in front of the world. The exam is conducted in subjects of syllabus covering High School and some General Knowledge.
        </p>
    </div>
    <?php include 'footer.php'; ?>
    <!-- Option 1: Bootstrap Bundle with Popper -->
    <script src='https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js' integrity='sha384-ka7Sk0Gln4gmtz2MlQnikT1wXgYsOg+OMhuP+IlRH9sENBO0LRn5q+8nbTov4+1p' crossorigin='anonymous'></script>
</body>

</html>