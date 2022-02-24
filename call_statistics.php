<?php
    require_once 'header.php';
    require_once "AsteriskDb.php";
    $db = new AsteriskDb();
    $data = $db->getCallDuration();
?>
    <div class="col mb-4 justify-content-center shadow-5-strong">
<!--===========================================================================================================================================-->

        <table class="table table-striped">
            <thead>
            <tr>
            <tr>
                <th scope="col"><p class="text-success">תאריך שיחה</p></th>
                <th scope="col"><p class="text-success">מספר טלפון</p></th>
                <th scope="col"><p class="text-success">מצב שיחה</p></th>
                <th scope="col"><p class="text-success">משך שיחה</p></th>
            </tr>
            </tr>
            </thead>
            <form method="post">
            <tbody>
            <?php

            foreach ($data as $item)
            {
                if ($item->disposition == 'ANSWERED')
                {
                    $ansvered = 'ענה לשיחה';
                }
                elseif ($item->disposition == 'BUSY')
                {
                    $ansvered = 'הטלפון תפוס';
                }
                echo "<tr><td>$item->calldate</td><td>$item->dst</td><td>$ansvered</td><td>$item->duration</td></tr>";
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