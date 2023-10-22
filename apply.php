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
        <h4>Apply for Talent Hunt Exam 2023</h4>
        <form method='POST' action='view_admit_card.php' enctype='multipart/form-data'>
            <div class="row">
                <div class='mb-3 col-md-4'>
                    <label for='student_name' class='form-label float-start'>Student Name * </label>
                    <input type='text' oninput="this.value = this.value.toUpperCase()" class='form-control' id='student_name' name='student_name' required>
                    <small class='form-text text-muted'>As per 10th record</small>
                </div>
                <div class='mb-3 col-md-4'>
                    <label for='student_class' class='form-label float-start'>Class * </label>
                    <input type='text' oninput="this.value = this.value.toUpperCase()" disabled class='form-control' id='student_class' name='student_class' value='10' required>
                </div>
                <div class='mb-3 col-md-4'>
                    <label for='father_name' class='form-label float-start'>Father Name * </label>
                    <input type='text' oninput="this.value = this.value.toUpperCase()" class='form-control' id='father_name' name='father_name' required>
                </div>
                <div class='mb-3 col-md-4'>
                    <label for='address' class='form-label float-start'>Address * </label>
                    <!-- <input type='text' oninput="this.value = this.value.toUpperCase()" class='form-control' id='address' name='address' required> -->
                    <textarea name="address" oninput="this.value = this.value.toUpperCase()" id="address" cols="30" rows="2" class='form-control' required></textarea>
                </div>
                <div class='mb-3 col-md-4'>
                    <label for='school' class='form-label float-start'>School Name * </label>
                    <textarea name="school" oninput="this.value = this.value.toUpperCase()" id="school" cols="30" rows="2" class='form-control' required></textarea>
                </div>
                <div class='mb-3 col-md-4'>
                    <label for='coaching' class='form-label float-start'>Coaching Name</label>
                    <textarea name="coaching" oninput="this.value = this.value.toUpperCase()" id="coaching" cols="30" rows="2" class='form-control'></textarea>
                </div>
                <div class='mb-3 col-md-4'>
                    <label for='sch_rol_no' class='form-label float-start'>School Roll No * </label>
                    <input type='number' min='1' oninput="this.value = this.value.toUpperCase()" class='form-control' id='sch_rol_no' name='sch_rol_no' required>
                </div>
                <div class='mb-3 col-md-4'>
                    <label for='phone' class='form-label float-start'>Parent's Mobile Number * </label>
                    <input type='number' min="1000000000" max="9999999999" class='form-control' id='phone' name='phone' required>
                    <small class='form-text text-muted'>10 digit Mobile number</small>
                </div>
                <div class='mb-3 col-md-4'>
                    <label for='email' class='form-label float-start'>Email</label>
                    <input type='text' class='form-control' id='email' name='email'>
                </div>
                <div class='mb-3 col-md-4'>
                    <label for='fileToUpload' class='form-label float-start'>Candidate's Photo *</label>
                    <input type='file' accept="image/*" class='form-control' id='fileToUpload' name='fileToUpload' required onchange="validateFile()">
                    <div class='text-danger' id='fileErrror' style="display:none ;">File size is greater than 100 kb</div>
                </div>
                <div class="col-md-4 mb-3">
                    <label for="photo">Photo Preview</label>
                    <img src="" alt="candidates photo" id='photo' style="display: block;" width="105" height="135px">
                </div>
                <div class="col-md-4 mb-3">
                    <button type='submit' id='submitBtn' disabled=true class='btn btn-primary mb-3' onclick="return confirm('Please check your data before submitting. Press \'Cancel\' to recheck data or press \'Ok\' to submit form.')">Submit</button>
                    <p>* fiels required</p>
                </div>
            </div>

        </form>
        <script>
            function validateFile() {
                const selectedFile = document.getElementById("fileToUpload").files[0];
                if (selectedFile) {
                    let fileSize = document.getElementById('fileToUpload').files[0].size / (1024);
                    if (fileSize <= 100) {
                        document.getElementById("submitBtn").disabled = false;
                        document.getElementById("fileErrror").style.display = "none";
                        const objectURL = URL.createObjectURL(selectedFile);
                        // Set the src attribute of the image to the URL
                        document.getElementById("photo").src = objectURL;
                    } else {
                        document.getElementById("submitBtn").disabled = true;
                        document.getElementById("fileErrror").style.display = "block";
                        document.getElementById("photo").src = '';
                    }
                } else {
                    document.getElementById("submitBtn").disabled = true;
                    document.getElementById("fileErrror").style.display = "none";
                    document.getElementById("photo").src = '';
                }
            }
        </script>
    </div>
    <!-- Option 1: Bootstrap Bundle with Popper -->
    <script src='https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js' integrity='sha384-ka7Sk0Gln4gmtz2MlQnikT1wXgYsOg+OMhuP+IlRH9sENBO0LRn5q+8nbTov4+1p' crossorigin='anonymous'></script>
</body>

</html>