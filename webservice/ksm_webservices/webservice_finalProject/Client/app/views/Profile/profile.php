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
              <h1 class="fw-bold mb-0 text-black">Profile</h1>
            </div>
            <!-- Begin of table to display cart item -->
            <hr class="my-4">
            <table class="table">
              <thead></thead>
              <div>
                <?php
                // var_dump ($data);
                // echo $data->name;
                if (!empty($data)) {
                    echo '<tbody class="card" style="border-right-width: 0; margin-top: 10px; border-radius: 5px; line-height:0.6; font-size: 18px">';
                    echo "<td style='border: 0; font-weight: bold;'>Username: $data->name</td>";
                    echo '<tr>';
                    echo "<td style='border: 0;'> Phone number:   $data->phone_num</td>";
                    echo '</tr>';
                    echo '<tr>';
                    echo "<td style='border: 0;'> Email: $data->email</td>";
                    echo '</tr>';
                    echo "<td style='border: 0;'> Api Key:  $data->api_key</td>";
                    echo "</tbody>";
                }
                ?>
              </div>
            </table>
            <button class="btn btn-dark" type="button" name="editProfile"><a href="<?= URLROOT ?> /editProfile" style="color:white;">Edit</a></button><br>
          </div>
        </div>
      </div>
    </div>
  </div>
</section>

<?php require APPROOT . '/views/includes/footer.php'; ?>