<?php

require_once 'header.php';
require_once "Db.php";
$db = new Db();
$data = $db->getIvrs();
?>

    <!--===========================================================================================================================================-->

    <table class="table table-striped shadow-5-strong"">
        <thead>
        <tr>
        <tr>
            <th scope="col"><p class="text-success">ID</p></th>
            <th scope="col"><p class="text-success">כותרת הקלטת קול</p></th>
            <th scope="col"><p class="text-success">שם קובץ</p></th>
            <th scope="col"><p class="text-success">למחוק קובץ</p></th>
        </tr>
        </tr>
        </thead>
<!--        action="insert_phone.php"-->
<!--        <form method="get" action="insert_phone.php">-->
            <tbody>
            <?php

            foreach ($data as $item)
            {
                $rec = str_replace("/var/www/html/speech2text.mine.nu/public/sound_files/", "", $item->file_name);
                echo "<tr><td>" . $item->id . "</td><td>" . $item->ivr_name .
                    "</td><td><audio controls style='height: 30px'><source src='/sound_files/$rec.wav'</audio></td><td>
              <a href='insert_phone.php?id=$item->id' value='$item->id' class='btn btn-warning btn-sm' type='submit'>שליחה</button></td></tr>";
            }
            ?>
            </tbody>
<!--        </form>-->
    </table>

    <!--===========================================================================================================================================-->

    </div>
    <!-- Modal example - top right -->

    <script type="text/javascript" src="js/mdb.min.js"></script>
    <!-- Custom scripts -->
    <script type="text/javascript"></script>


<?php require_once 'footer.php'; ?>