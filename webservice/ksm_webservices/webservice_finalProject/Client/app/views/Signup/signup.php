<?php
//require_once dirname(__DIR__).'/controllers/signupController.php';
//require_once dirname(__DIR__) . '/core/Controller.php';
require APPROOT . '\views\includes\header.php';
require APPROOT . '\views\includes\navbar.php';
?>

<!DOCTYPE html>
<html>

<head>
</head>
<br>

<body>
    <form class="well form-horizontal" action="" method="post" id="signup">
        <div class="form-group right-text-styling w-60 p-4 mx-auto">
            <!-- Center the text -->
            <div class="row d-flex justify-content-center align-items-center h-10">
                <!-- Card length -->
                <div class="col-12 col-md-8 col-lg-6 col-xl-6">
                    <div class="card shadow-2-strong" style="border-radius: 1rem;">
                        <!-- Length of the card's content -->
                        <div class="card-body p-3">
                            <h3 align="center">Sign Up</h3>
                            <br />
                            <input type="text" name="username" class="form-control" placeholder="Username" />
                            <br />
                            <input type="text" name="email" class="form-control" placeholder="Email" />
                            <br /> <input type="text" name="contact_no" class="form-control" placeholder="Phone Number" />
                            <br />
                            <input type="password" name="password" class="form-control" placeholder="Password" />
                            <br />
                            <input type="password" name="password" class="form-control" placeholder="Confirm password" />
                            <br />
                            <div class="d-grid gap-2" align="center">
                                <button class="btn btn-dark" name="signup" type="submit">Sign Up</button>
                            </div><br>
                            <p class="text-center">Already registered? <a href="<?= URLROOT ?>/Login" style="color:black;"> Login</a>
                            </p>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </form>
</body>



</html>

<?php
if (isset($_POST['signup'])) {
    $controller = new signupController();
    $controller->createUser();
}
?>