<?php
    require_once 'header.php';
    require_once "Db.php";
    $db = new Db();
    $data = $db->getIvrs();
?>
    <div class="col mb-4 justify-content-center shadow-5-strong"">
<!--===========================================================================================================================================-->

        <table class="table table-striped">
            <thead>
            <tr>
            <tr>
                <th scope="col"><p class="text-success">ID</p></th>
                <th scope="col"><p class="text-success">כותרת הקלטת קול</p></th>
                <th scope="col"><p class="text-success">שם קוב</p></th>
                <th scope="col"><p class="text-success">למחוק קובץ</p></th>
            </tr>
            </tr>
            </thead>
            <form method="post">
            <tbody>
            <?php

            foreach ($data as $item)
            {
                $rec = str_replace("/var/www/html/speech2text.mine.nu/public/sound_files/", "", $item->file_name);
                echo "<tr><td>" . $item->id . "</td><td>" . $item->ivr_name .
                     "</td><td><audio controls style='height: 30px'><source src='/sound_files/$rec.wav'</audio></td><td>
                      <button type='submit' name='id' value='$item->id' class='btn btn-danger btn-sm'>למחוק</button></td></tr>";
            }
            ?>
            </tbody>
            </form>
        </table>

<!--===========================================================================================================================================-->

</div>


<script type="text/javascript" src="js/mdb.min.js"></script>
<!-- Custom scripts -->
<script type="text/javascript"></script>

<?php
if (isset($_POST['id']))
{
    $id = $_POST['id'];
    $file_name = $db->getRecordName($id);
    $db->deleteRecord($_POST['id']);
    unlink("$file_name.wav");
}
?>

<?php require_once 'footer.php';?>