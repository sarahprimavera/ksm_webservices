<?php require APPROOT . '\views\includes\header.php';?>
<?php require APPROOT . '\views\includes\navbar.php';?>
    
    <br>
    <div class="d-flex justify-content-center">
        <form action="/FinalProject/ksm_webservices/webservice_finalProject/Client/Translate/getInput" method="POST" enctype="multipart/form-data">
            
        
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
            <br>
            <Button type="submit" name="translate" >submit</Button>
        </form>

</div>
<?php require APPROOT . '/views/includes/footer.php'; ?>