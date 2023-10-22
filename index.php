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
    <title>Home | Talent Hunt</title>
</head>

<body>
    <?php
    include 'header.php';
    ?>
    <div class='container my-3'>
        <h3 class="text-center">Talent Hunt Exam 2023 Kendra Mahatha Ladania</h3>
        <div class="border p-3 m-3">
            <ul>
                <li>
                    Registration open <a href="apply.php">New Application</a>
                </li>
                <li>Last Date of Registration is 18.11.2023</li>
                <li>Exam date is 21.11.2023</li>
            </ul>
        </div>
        <div id="carouselExampleInterval" class="carousel slide mb-3" data-bs-ride="carousel">
            <div class="carousel-inner">
                <div class="carousel-item active" data-bs-interval="2000">
                    <img src="images/img1.jpeg" class="d-block w-100" alt="...">
                </div>
                <div class="carousel-item">
                    <img src="images/img2.jpeg" class="d-block w-100" alt="...">
                </div>
                <div class="carousel-item">
                    <img src="images/img3.jpeg" class="d-block w-100" alt="...">
                </div>
                <div class="carousel-item">
                    <img src="images/img4.jpeg" class="d-block w-100" alt="...">
                </div>
                <div class="carousel-item">
                    <img src="images/img5.jpeg" class="d-block w-100" alt="...">
                </div>
            </div>
            <button class="carousel-control-prev" type="button" data-bs-target="#carouselExampleInterval" data-bs-slide="prev">
                <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                <span class="visually-hidden">Previous</span>
            </button>
            <button class="carousel-control-next" type="button" data-bs-target="#carouselExampleInterval" data-bs-slide="next">
                <span class="carousel-control-next-icon" aria-hidden="true"></span>
                <span class="visually-hidden">Next</span>
            </button>
        </div>
        <p>
            <b>The Talent Hunt Exam</b> is one of the most prestigious exams conducted for school students for class 10th. The exams as the name suggest identifying hidden talent in school children. The organization believes that all children are blessed with unique qualities. Parents must expose their talent, polish it and present it in front of the world. The exam is conducted in subjects of syllabus covering High School and some General Knowledge.
        </p>
    </div>
    <!-- Option 1: Bootstrap Bundle with Popper -->
    <script src='https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js' integrity='sha384-ka7Sk0Gln4gmtz2MlQnikT1wXgYsOg+OMhuP+IlRH9sENBO0LRn5q+8nbTov4+1p' crossorigin='anonymous'></script>
</body>

</html>