<?php require APPROOT . '\views\includes\header.php';?>
<?php require APPROOT . '\views\includes\navbar.php';?>
    
    <br>
    <form action="TestParse.php" method="post" enctype="multipart/form-data">
        <!-- Example single danger button -->
      
        <label class="form-label" for="customFile">Upload Text File</label>
        <input type="file" class="form-control" id="customFile" />
        <div>
            <h3>From - Language</h3>
        <select name="original_language">
              <option value="en" selected>English</option>
              <option value="fr">French</option>
              <option value="sp">Spanish</option>
              <option value="it">Italian</option>
            </select> <br><br>
</div>
<div>
            <h3>To - Language</h3>
        <select name="target_language">
              <option value="en" selected>English</option>
              <option value="fr">French</option>
              <option value="sp">Spanish</option>
              <option value="it">Italian</option>
            </select> <br><br>
</div>
    </form>
<?php require APPROOT . '/views/includes/footer.php'; ?>