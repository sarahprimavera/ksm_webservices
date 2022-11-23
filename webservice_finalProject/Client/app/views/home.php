<?php require APPROOT . '/views/includes/header.php'; ?> 
    
    <form action="TestParse.php" method="post" enctype="multipart/form-data">
   <label for="file">Filename:</label> <input type="file" name="file" id="file"/>
<input type="submit" value="Submit">
</form>
<?php require APPROOT . '/views/includes/footer.php'; ?>