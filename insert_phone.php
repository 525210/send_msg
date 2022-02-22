<?php

require_once 'header.php';
require_once "Db.php";
$db = new Db();
$data = $db->getIvrs();
$record_name = $db->getRecordName($_GET['id']);
$rec = str_replace("/usr/share/asterisk/agi-bin/sound/", "", $record_name);

?>

<form method="post">
    <div class="container">
        <div class="row">
            <div class="col-4">
                <audio controls style="height: 30px">
                    <source src="http://104.155.124.139:96/<?php echo $rec; ?>.wav">
                </audio>
            </div>
            <div class="col-4">
                <input type="text" name="phone_num" class="form-control" placeholder="הכנס מספר טלפון"/>
            </div>
            <div class="col-4">
                <button type="submit" class="btn btn-success">שליחת הודעה</button>
            </div>
        </div>
    </div>
</form>
<script type="text/javascript" src="js/mdb.min.js"></script>
<!-- Custom scripts -->
<script type="text/javascript"></script>

<?php
if (isset($_POST['phone_num']))
{
    $id = $_GET['id'];
//    print_r($id);
    $db->createCallFiles($_POST['phone_num'], $id);
//    print_r($_POST);
}
?>

<?php require_once 'footer.php'; ?>

