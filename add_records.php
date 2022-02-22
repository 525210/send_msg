<?php
    require_once 'header.php';
    require_once "Db.php";
    require_once 'ttsservice.php';
    $db = new Db();
    $data = $db->getIvrs();
?>

    <div class="col mb-4 justify-content-center">
<!--===========================================================================================================================================-->
        <form method="post">
            <textarea class="form-control" name="text_rec" rows="4"></textarea>
            <label class="form-label">הזן טקסט</label>
            <button type="submit" class="btn btn-primary btn-block mb-4">יצירת הודעה חדשה</button>
        </form>

        <?php
        if (isset($_POST['text_rec']))

        {
            $text = $_POST['text_rec'];
            $check_record = $db->checkRecordsFilesOnDb($text);
            if ($check_record)
            {
                echo "<div class='alert alert-danger' role='alert'>קובץ כזה כבר קיים!</div>";
            }
            else
            {
                $recording_data = $db->textToSpeech($text);
                $db->addSoundFilenameToDb($text, $recording_data);
                echo "<div class='alert alert-success' role='alert'>הקובץ נשמר במסד הנתונים!</div>";
            }
        }

        ?>


<!--===========================================================================================================================================-->
    </div>

    <script type="text/javascript" src="js/mdb.min.js"></script>
    <!-- Custom scripts -->
    <script type="text/javascript"></script>


<?php require_once 'footer.php';?>