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
              <h1 class="fw-bold mb-0 text-black">History</h1>
            </div>
            <!-- Begin of table to display cart item -->
            <hr class="my-4">
            <table class="table">
              <thead></thead>
              <div>
                <?php
                if (!empty($data)) {
                  foreach ($data as $raw) {
                    echo '<tbody class="card" style="border-right-width: 0; margin-top: 10px; border-radius: 5px; line-height:0.6; font-size: 13px">';
                    echo "<td style='border: 0; font-weight: bold;'>$raw->request_date</td>";
                    echo '<tr>';
                    echo "<td style='border: 0;'> Original Language: $raw->original_language </td>";
                    echo '</tr>';
                    echo "<td style='border: 0;'> Translated language: $raw->translated_language </td>";
                    echo '<td style="border: 0;">';
                    echo "</td>";
                    echo "</tbody>";
                  }
                }
                ?>
              </div>
            </table>
          </div>
        </div>
      </div>
    </div>
  </div>
</section>

<?php require APPROOT . '/views/includes/footer.php'; ?>