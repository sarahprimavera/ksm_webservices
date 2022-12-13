<nav class="navbar navbar-expand-sm navbar-dark bg-dark">
  <div class="container-fluid">
    <a class="navbar-brand" href="<?= URLROOT ?>/home">KSM Translator</a>
    <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#mynavbar">
      <span class="navbar-toggler-icon"></span>
    </button>
    <div class="collapse navbar-collapse" id="mynavbar">
      <ul class="navbar-nav me-auto">
        <li class="nav-item active">
          <a class="nav-link" href="<?= URLROOT ?>/home">Home <span class="sr-only">(current)</span></a>
        </li>
        <?php
        if (isLoggedIn()) {
          echo ('<li class="nav-item">');
          echo ('<a class="nav-link" href="<?= URLROOT ?>/Profile">History</a>');
          echo ('</li>');
        } ?>
        <li class="nav-item">
          <a class="nav-link" href="<?= URLROOT ?>/Profile">Profile</a>
        </li>
      </ul>
      <form class="d-flex">
        <ul class="nav navbar-nav navbar-right">
          <?php

          if (isLoggedIn()) {
            echo (' <li class="nav-item"><a class="nav-link" href="http://localhost/FinalProject/ksm_webservices/webservice_finalProject/Client/Login/logout"><i class="fa-solid fa-sign-out"></i> Logout ' . $_SESSION['user_username'] . '</a></li>');
          } else {
            echo ('<a class="nav-link" href="http://localhost/FinalProject/ksm_webservices/webservice_finalProject/Client/signupController"><i class="fa-solid fa-user-plus"></i> Signup</a>');
            echo ('<a class="nav-link" href="http://localhost/FinalProject/ksm_webservices/webservice_finalProject/Client/Login"><i class="fa-solid fa-user-plus"></i> Login</a>');
          }
          ?>
        </ul>
      </form>
    </div>
  </div>
</nav>