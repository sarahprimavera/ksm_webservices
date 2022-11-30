<?php
require APPROOT . '\views\includes\header.php';
require APPROOT . '\views\includes\navbar.php';
?>

<form class="px-4 py-3" method="post" action="">
    <div class="form-group right-text-styling w-60 p-5 mx-auto">
        <!-- Center the text -->
        <div class="row d-flex justify-content-center align-items-center h-10">
            <!-- Card length -->
            <div class="col-12 col-md-8 col-lg-6 col-xl-6">
                <div class="card shadow-2-strong" style="border-radius: 1rem;">
                    <!-- Length of the card's content -->
                    <div class="card-body p-5">
                        <form method="POST">
                            <h3 align="center">Login</h3><br />
                            <input type="text" name="username" class="form-control" placeholder="Enter Username" /><br />
                            <input type="password" name="password" class="form-control" placeholder="Enter Password" /><br />
                            <div class="d-grid gap-2" align="center">
                                <button class="btn btn-dark" type="submit" name="login">Login</button><br>
                            </div>

                            <p class="text-center mt-3">Not registered yet? <a href="<?= URLROOT ?> /signupController" style="color:black;">Sign Up</a></p>
                            <!-- Line bellow sign up href -->
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
</form>