<!-- Google Fonts -->
<link rel="stylesheet" href="https://fonts.googleapis.com/css2?family=Poppins">
<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.1/font/bootstrap-icons.css">
<nav class='navbar navbar-expand-lg navbar-dark bg-dark'>
    <div class='container-fluid'>
        <a class='navbar-brand  ' href='index.php'>TalentHunt</a>
        <!-- <img src='images/logo.png' alt='BrandName' width='30' height='30'> -->
        <button class='navbar-toggler' type='button' data-bs-toggle='collapse' data-bs-target='#navbarSupportedContent' aria-controls='navbarSupportedContent' aria-expanded='false' aria-label='Toggle navigation'>
            <span class='navbar-toggler-icon'></span>
        </button>
        <div class='collapse navbar-collapse text-center' id='navbarSupportedContent'>
            <ul class='navbar-nav me-auto mb-2 mb-lg-0'>
                <li class='nav-item'>
                    <a id='home' class='nav-link active ' aria-current='page' href='index.php'>Home</a>
                </li>
                <?php
                if (isset($_SESSION['loggedin']) && $_SESSION['loggedin'] == true) {
                    echo "<li class='nav-item'>
                        <a class='nav-link active ' href='all_applications.php'>All Applications</a>
                        </li>";
                }
                ?>
                <li class='nav-item dropdown'>
                    <a class='nav-link dropdown-toggle active ' href='#' id='navbarDropdown' role='button' data-bs-toggle='dropdown' aria-expanded='false'>
                        Applications
                    </a>
                    <ul class='dropdown-menu' aria-labelledby='navbarDropdown'>
                        <li><a class='dropdown-item ' href='apply.php'>New Application</a></li>
                        <li><a class='dropdown-item ' href='view_admit_card.php'>Download Admit Card</a></li>
                        <li><a class='dropdown-item ' href='search.php'>Search Roll no</a></li>
                    </ul>
                </li>
                <li class='nav-item'>
                    <a id='about' class='nav-link active ' aria-current='page' href='about.php'>About Us</a>
                </li>
                <li class='nav-item'>
                    <a id='contact' class='nav-link active ' aria-current='page' href='contact.php'>Contact Us</a>
                </li>
            </ul>

            <?php
            if (!isset($_SESSION['loggedin'])) {
                echo "<a href='login.php' class='btn btn-primary' >Login</a>";
            } else {
                echo "<form class='d-flex me-2 mb-2 mb-md-0' role='search' action='roll_no_detail.php'>
                        <div class='input-group'>
                            <input name='exam_rol_no' class='form-control' type='number' aria-label='Search' placeholder='Roll No' required>
                            <button class='btn btn-primary' type='submit'><i class='bi bi-search'></i></button>
                        </div>
                    </form>
                        <div class='btn-group'>
                        <button id='userMenu' type='button' class='btn btn-primary dropdown-toggle ' data-bs-toggle='dropdown' aria-expanded='false' value=''>
                        User
                        </button>
                        <ul class='dropdown-menu dropdown-menu-end'>
                        <li><a class='dropdown-item ' href='change_password.php'>Change Password</a></li>
                        <li><a class='dropdown-item ' href='logout.php'>Logout</a></li>
                        </ul>
                        </div>";
            }
            ?>
        </div>
    </div>
</nav>
<style>
    body {
        font-family: 'Poppins', sans-serif;
    }

    .dropdown:hover .dropdown-menu {
        display: block;
    }

    @media only screen and (min-width: 960px) {
        .navbar .navbar-nav .nav-item .nav-link {
            padding: 0 0.5em;
        }

        .navbar .navbar-nav .nav-item:not(:last-child) .nav-link {
            border-right: 1px solid #f8efef;
        }
    }
</style>