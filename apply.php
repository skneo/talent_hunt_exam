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
    <title>New Application | Talent Hunt</title>
</head>

<body>
    <?php
    include 'header.php';
    ?>
    <div class='container my-3'>
        <h4>Apply for Talent Hunt Exam 2022</h4>
        <form method='GET' action='verify.php'>
            <div class='mb-3'>
                <label for='student_name' class='form-label float-start'>Student Name * </label>
                <input type='text' oninput="this.value = this.value.toUpperCase()" class='form-control' id='student_name' name='student_name' required>
                <small class='form-text text-muted'>As per 10th record</small>
            </div>
            <div class='mb-3'>
                <label for='father_name' class='form-label float-start'>Father Name * </label>
                <input type='text' oninput="this.value = this.value.toUpperCase()" class='form-control' id='father_name' name='father_name' required>
            </div>
            <div class='mb-3'>
                <label for='address' class='form-label float-start'>Address * </label>
                <input type='text' oninput="this.value = this.value.toUpperCase()" class='form-control' id='address' name='address' required>
            </div>
            <div class='mb-3'>
                <label for='school' class='form-label float-start'>School Name * </label>
                <input type='text' oninput="this.value = this.value.toUpperCase()" class='form-control' id='school' name='school' required>
            </div>
            <div class='mb-3'>
                <label for='coaching' class='form-label float-start'>Coaching Name</label>
                <input type='text' oninput="this.value = this.value.toUpperCase()" class='form-control' id='coaching' name='coaching'>
            </div>
            <div class='mb-3'>
                <label for='student_class' class='form-label float-start'>Class * </label>
                <input type='text' oninput="this.value = this.value.toUpperCase()" disabled class='form-control' id='student_class' name='student_class' value='10' required>
            </div>
            <div class='mb-3'>
                <label for='sch_rol_no' class='form-label float-start'>School Roll No * </label>
                <input type='text' oninput="this.value = this.value.toUpperCase()" class='form-control' id='sch_rol_no' name='sch_rol_no' required>
            </div>
            <div class='mb-3'>
                <label for='phone' class='form-label float-start'>Parent's Phone Number * </label>
                <input type='number' class='form-control' id='phone' name='phone' required>
            </div>
            <div class='mb-3'>
                <label for='email' class='form-label float-start'>Email * </label>
                <input type='text' class='form-control' id='email' name='email'>
            </div>
            <button type='submit' class='btn btn-primary' onclick="return confirm('Please check your data before submitting. Press \'Cancel\' to recheck data or press \'Ok\' to submit form.')">Submit</button>
            <p>* fiels required</p>
        </form>
    </div>
    <!-- Option 1: Bootstrap Bundle with Popper -->
    <script src='https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js' integrity='sha384-ka7Sk0Gln4gmtz2MlQnikT1wXgYsOg+OMhuP+IlRH9sENBO0LRn5q+8nbTov4+1p' crossorigin='anonymous'></script>
</body>

</html>