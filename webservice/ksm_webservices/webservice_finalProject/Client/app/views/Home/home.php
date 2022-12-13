<?php require APPROOT . '\views\includes\header.php'; ?>
<?php require APPROOT . '\views\includes\navbar.php'; ?>
<?php
if (!empty($data['msg'])) {
    echo ('<div class="alert alert-success alert-dismissible show" role="alert">');
    echo ('' . $data['msg'] . '');
    echo ('<button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button></div>');
}
?>
<br>
<div class="container text-center">
    <form action="/webservice\ksm_webservices\webservice_finalProject/Client/Translate/getInput" method="POST" enctype="multipart/form-data">
        <div class="form-group right-text-styling w-60 p-5 mx-auto">
            <h3>Language translator</h3>
            <div>
                <p>
                    Translate texts and full document files instantly. Accurate translations for individuals and Teams.
                </p>
            </div>


            <div class="row">
                <div class="col-sm-1"></div>
                <div class="col-sm-5">
                    <!-- <select class="form-select" id="country">
                            <option selected value="EN">English</option>
                        </select> -->
                    <select class="form-select" name="original_language" id="country" style="margin-left: -10px;">
                        <option selected value="EN">From → English</option>
                        <option value="AF">Afrikaans</option>
                        <option value="SQ">Albanian</option>
                        <option value="AR">Arabic</option>
                        <option value="HY">Armenian</option>
                        <option value="EU">Basque</option>
                        <option value="BN">Bengali</option>
                        <option value="BG">Bulgarian</option>
                        <option value="CA">Catalan</option>
                        <option value="KM">Cambodian</option>
                        <option value="ZH">Chinese (Mandarin)</option>
                        <option value="HR">Croatian</option>
                        <option value="CS">Czech</option>
                        <option value="DA">Danish</option>
                        <option value="NL">Dutch</option>
                        <option value="EN">English</option>
                        <option value="ET">Estonian</option>
                        <option value="FJ">Fiji</option>
                        <option value="FI">Finnish</option>
                        <option value="FR">French</option>
                        <option value="KA">Georgian</option>
                        <option value="DE">German</option>
                        <option value="EL">Greek</option>
                        <option value="GU">Gujarati</option>
                        <option value="HE">Hebrew</option>
                        <option value="HI">Hindi</option>
                        <option value="HU">Hungarian</option>
                        <option value="IS">Icelandic</option>
                        <option value="ID">Indonesian</option>
                        <option value="GA">Irish</option>
                        <option value="IT">Italian</option>
                        <option value="JA">Japanese</option>
                        <option value="JW">Javanese</option>
                        <option value="KO">Korean</option>
                        <option value="LA">Latin</option>
                        <option value="LV">Latvian</option>
                        <option value="LT">Lithuanian</option>
                        <option value="MK">Macedonian</option>
                        <option value="MS">Malay</option>
                        <option value="ML">Malayalam</option>
                        <option value="MT">Maltese</option>
                        <option value="MI">Maori</option>
                        <option value="MR">Marathi</option>
                        <option value="MN">Mongolian</option>
                        <option value="NE">Nepali</option>
                        <option value="NO">Norwegian</option>
                        <option value="FA">Persian</option>
                        <option value="PL">Polish</option>
                        <option value="PT">Portuguese</option>
                        <option value="PA">Punjabi</option>
                        <option value="QU">Quechua</option>
                        <option value="RO">Romanian</option>
                        <option value="RU">Russian</option>
                        <option value="SM">Samoan</option>
                        <option value="SR">Serbian</option>
                        <option value="SK">Slovak</option>
                        <option value="SL">Slovenian</option>
                        <option value="ES">Spanish</option>
                        <option value="SW">Swahili</option>
                        <option value="SV">Swedish </option>
                        <option value="TA">Tamil</option>
                        <option value="TT">Tatar</option>
                        <option value="TE">Telugu</option>
                        <option value="TH">Thai</option>
                        <option value="BO">Tibetan</option>
                        <option value="TO">Tonga</option>
                        <option value="TR">Turkish</option>
                        <option value="UK">Ukrainian</option>
                        <option value="UR">Urdu</option>
                        <option value="UZ">Uzbek</option>
                        <option value="VI">Vietnamese</option>
                        <option value="CY">Welsh</option>
                        <option value="XH">Xhosa</option>
                    </select>
                </div>
                <div class="col-sm-5">
                    <!-- <div class="form-group col-md-3"> -->
                    <select class="form-select" name="target_language" id="country" style="margin-left: -10px;">
                        <option selected value="EN">To → English</option>
                        <option value="AF">Afrikaans</option>
                        <option value="SQ">Albanian</option>
                        <option value="AR">Arabic</option>
                        <option value="HY">Armenian</option>
                        <option value="EU">Basque</option>
                        <option value="BN">Bengali</option>
                        <option value="BG">Bulgarian</option>
                        <option value="CA">Catalan</option>
                        <option value="KM">Cambodian</option>
                        <option value="ZH">Chinese (Mandarin)</option>
                        <option value="HR">Croatian</option>
                        <option value="CS">Czech</option>
                        <option value="DA">Danish</option>
                        <option value="NL">Dutch</option>
                        <option value="EN">English</option>
                        <option value="ET">Estonian</option>
                        <option value="FJ">Fiji</option>
                        <option value="FI">Finnish</option>
                        <option value="FR">French</option>
                        <option value="KA">Georgian</option>
                        <option value="DE">German</option>
                        <option value="EL">Greek</option>
                        <option value="GU">Gujarati</option>
                        <option value="HE">Hebrew</option>
                        <option value="HI">Hindi</option>
                        <option value="HU">Hungarian</option>
                        <option value="IS">Icelandic</option>
                        <option value="ID">Indonesian</option>
                        <option value="GA">Irish</option>
                        <option value="IT">Italian</option>
                        <option value="JA">Japanese</option>
                        <option value="JW">Javanese</option>
                        <option value="KO">Korean</option>
                        <option value="LA">Latin</option>
                        <option value="LV">Latvian</option>
                        <option value="LT">Lithuanian</option>
                        <option value="MK">Macedonian</option>
                        <option value="MS">Malay</option>
                        <option value="ML">Malayalam</option>
                        <option value="MT">Maltese</option>
                        <option value="MI">Maori</option>
                        <option value="MR">Marathi</option>
                        <option value="MN">Mongolian</option>
                        <option value="NE">Nepali</option>
                        <option value="NO">Norwegian</option>
                        <option value="FA">Persian</option>
                        <option value="PL">Polish</option>
                        <option value="PT">Portuguese</option>
                        <option value="PA">Punjabi</option>
                        <option value="QU">Quechua</option>
                        <option value="RO">Romanian</option>
                        <option value="RU">Russian</option>
                        <option value="SM">Samoan</option>
                        <option value="SR">Serbian</option>
                        <option value="SK">Slovak</option>
                        <option value="SL">Slovenian</option>
                        <option value="ES">Spanish</option>
                        <option value="SW">Swahili</option>
                        <option value="SV">Swedish </option>
                        <option value="TA">Tamil</option>
                        <option value="TT">Tatar</option>
                        <option value="TE">Telugu</option>
                        <option value="TH">Thai</option>
                        <option value="BO">Tibetan</option>
                        <option value="TO">Tonga</option>
                        <option value="TR">Turkish</option>
                        <option value="UK">Ukrainian</option>
                        <option value="UR">Urdu</option>
                        <option value="UZ">Uzbek</option>
                        <option value="VI">Vietnamese</option>
                        <option value="CY">Welsh</option>
                        <option value="XH">Xhosa</option>
                    </select>
                </div>
            </div><br>

            <div class="row">
                <div class="col-sm-1"></div>
                <!-- Translate textarea 1 -->
                <div class="col-sm-5">
                    <!-- <textarea class="form-control" id="firstLanguageTextare" rows="7" class="btn btn-secondary mr-5"></textarea> -->
                    <div class="container d-flex justify-content-center mt-100">
                        <div class="row">

                            <div class="file-drop-area" for="customFile" style="position: relative; 
                                                                           display: flex; 
                                                                           align-items: center; 
                                                                           border: dashed 1px rgba(77, 76, 76, 0.53); 
                                                                           width:490px; 
                                                                           height:182px;
                                                                           padding: 72px; 
                                                                           margin-top: -10px;
                                                                           margin-left: -10px;
                                                                           border-radius: 5px;">

                                <span class="choose-file-button" for="customFile" style="flex-shrink: 0;
                                                                                    background-color: rgba(100, 98, 98, 0.126);
                                                                                    border: 5px solid rgba(255, 255, 255, 0.1);
                                                                                    border-radius: 3px;
                                                                                    padding: 8px 15px;
                                                                                    margin-right: 10px;
                                                                                    font-size: 14px;
                                                                                    text-transform: uppercase;">Choose files
                                </span>
                                <span class="file-message" style="font-size:medium;
                                                                              font-weight: 200;
                                                                              line-height: 1.4;
                                                                              white-space: nowrap;
                                                                              overflow: hidden;
                                                                              text-overflow: ellipsis;">or drag and drop here
                                </span>
                                <input type="file" name="txtFile" class="form-control" id="customFile" multiple style="  position: absolute;
                                                                                                    left: 0;
                                                                                                    top: 0;
                                                                                                    height: 100%;
                                                                                                    width: 100%;
                                                                                                    cursor: pointer;
                                                                                                    opacity: 0;">
                            </div>

                        </div>
                    </div>
                </div>
                <!-- Translate textarea 2 -->
                <div class="col-sm-5">
                    <textarea class="form-control" id="secondLanguageTextare" rows="7" style="margin-top: -10px; 
                                                                                                 margin-left: -10px;"></textarea>
                </div>
            </div> <br>

            <!-- Translate button -->
            <?php
            if (!isLoggedIn()) {
                echo '<div class="d-flex justify-content-center">
                    <button type="submit" class="btn btn-dark" disabled name="translate" style="width: 70%;"> Translate
                    </button>
                </div>';
            } else {
                echo '<div class="d-flex justify-content-center">
                    <button type="submit" class="btn btn-dark" name="translate" style="width: 70%;"> Translate
                    </button>
                </div>';
            }
            ?>
    </form>
</div>

<?php require APPROOT . '/views/includes/footer.php'; ?>