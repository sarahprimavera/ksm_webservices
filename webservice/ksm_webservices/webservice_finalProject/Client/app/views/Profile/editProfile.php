<?php require APPROOT . '\views\includes\header.php'; ?>
<?php require APPROOT . '\views\includes\navbar.php'; ?>
<section class="h-100 h-custom">
  <!-- Container position -->
  <div class="container py-5 h-100">
    <!-- Center the container -->
    <div class="row d-flex justify-content-center align-items-center h-100">
      <!-- Box width -->
      <div class="col-9">
        <!-- Box border -->
        <div class="card" style="border-radius: 15px;">
          <div class="p-5">
            <div class="d-flex justify-content-between align-items-center mb-3">
              <h1 class="fw-bold mb-0 text-black">Update Profile</h1>
            </div>
            <!-- Begin of table to display cart item -->
            <hr class="my-4">
            <table class="table">
              <thead></thead>
              <div>
                <form action="<?= URLROOT ?> /editProfile" method="post" enctype="multipart/form-data">

                    <div class="form-group">
                        <label style="border:0; font-weight:bold;">Username:</label>
                        <input name="updateUser" type="text" class="form-control" id="updateUser" value="<?php echo $data->name?>">
                    </div><div class="form-group">
                        <label style="border:0; font-weight:bold;">Phone Number:</label>
                        <input name="updateNumber" type="text" class="form-control" id="updateNumber" value="<?php echo $data->phone_num?>">
                    </div><div class="form-group">
                        <label style="border:0; font-weight:bold;">Email:</label>
                        <input name="updateEmail" type="text" class="form-control" id="updateEmail" value="<?php echo $data->email?>">
                    <br>
                    <button type="submit" name="update" id="update" class="btn btn-dark">Update</button>
                    </form>
                    </div>
            </table>
          </div>
        </div>
      </div>
    </div>
  </div>
</section>
<?php require APPROOT . '/views/includes/footer.php'; ?>