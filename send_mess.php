<?php
require_once "Db.php";
require_once 'ttsservice.php';
$db = new Db();

$data = $db->getIvrs();
require_once 'menu.php'; ?>

<div class="container container-sm mt-4 text-center">

    <div class="grid" style="--bs-columns: 3;">
        <div>
            <form method="post">
                    <div class="mb-3">
                    <label class="form-label"><h2>הזן טקסט</h2></label>
                    <textarea name="text_rec" class="form-control" rows="3"></textarea>
                </div>
                <div class="mb-3">
                    <label class="form-label"><h2>הכנס מספר טלפון</h2></label>
                    <input name="phone_num" class="form-control" rows="3"></input>
                </div>
                <div class="mb-3">
                    <button type="submit" class="btn btn-warning">שמור את הקובץ</button>
                </div>
            </form>
        </div>
    </div>

    <?php
    if (isset($_POST['text_rec']))

    {
//        print_r($_POST);
//        $text = $_POST['text_rec'];
//        $check_record = $db->checkRecordsFilesOnDb($text);
//        if ($check_record)
//        {
//            echo "<div class='alert alert-danger' role='alert'>קובץ כזה כבר קיים!</div>";
//        }
//        else
//        {
//            $recording_data = $db->textToSpeech($text);
//            $db->addSoundFilenameToDb($text, $recording_data);
//            echo "<div class='alert alert-success' role='alert'>הקובץ נשמר במסד הנתונים!</div>";
//        }

        echo "<div class='modal' tabindex='-1'>
  <div class='modal-dialog'>
    <div class='modal-content'>
      <div class='modal-header'>
        <h5 class='modal-title'>Modal title</h5>
        <button type='button' class='btn-close' data-mdb-dismiss='modal' aria-label='Close'></button>
      </div>
      <div class='modal-body'>
        <p>Modal body text goes here.</p>
      </div>
      <div class='modal-footer'>
        <button type='button' class='btn btn-secondary' data-mdb-dismiss='modal'>Close</button>
        <button type='button' class='btn btn-primary'>Save changes</button>
      </div>
    </div>
  </div>
</div>";
    }



    ?>

</div>
<?php require_once 'footer.php'; ?>


    <!-- MDB -->
    <script
        type="text/javascript"
        src="https://cdnjs.cloudflare.com/ajax/libs/mdb-ui-kit/3.10.2/mdb.min.js"
    ></script>
