<?php require APPROOT . '\views\includes\header.php';?>
<?php require APPROOT . '\views\includes\navbar.php';?>
    
    <br>
    <div class="d-flex justify-content-center">
        <form action="TestParse.php" method="post" enctype="multipart/form-data">
            <!-- Example single danger button -->
        
            <label class="form-label" for="customFile">Upload Text File</label>
            <input type="file" class="form-control" id="customFile" />
            <div>
                <label>From - Language</label>
                 <select name="original_language" style="margin: 20px">
                <option value="en" selected>English</option>
                <option value="fr">French</option>
                <option value="sp">Spanish</option>
                <option value="it">Italian</option>
                </select> <br><br>
            </div>
            <div>
                <label>To - Language</label>
                <select name="target_language" style="margin-left: 40px">
                <option value="en" selected>English</option>
                <option value="fr">French</option>
                <option value="sp">Spanish</option>
                <option value="it">Italian</option>
                </select> <br><br>
            </div>
        </form>

</div>
<?php require APPROOT . '/views/includes/footer.php'; ?>