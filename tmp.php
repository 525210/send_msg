<!DOCTYPE html>
<html lang="he" dir="rtl">
<head>
    <meta charset="UTF-8" />
    <meta
            name="viewport"
            content="width=device-width, initial-scale=1, shrink-to-fit=no"
    />
    <meta http-equiv="x-ua-compatible" content="ie=edge" />
    <title>Material Design for Bootstrap</title>
    <!-- MDB icon -->
    <link rel="icon" href="img/mdb-favicon.ico" type="image/x-icon" />
    <!-- Font Awesome -->
    <link
            rel="stylesheet"
            href="https://use.fontawesome.com/releases/v5.15.2/css/all.css"
    />
    <!-- Google Fonts Roboto -->
    <link
            rel="stylesheet"
            href="https://fonts.googleapis.com/css2?family=Roboto:wght@300;400;500;700&display=swap"
    />
    <!-- Dark MDB theme -->
    <link rel="stylesheet" href="css/mdb.dark.min.css" />
    <!-- Regular MDB theme -->
    <!-- <link rel="stylesheet" href="css/mdb.min.css" /> -->
</head>
<body>


<div class="container my-5">
    <nav class="navbar navbar-expand-lg navbar-dark bg-dark">
        <div class="container-fluid">
            <a class="navbar-brand" href="#">מערכת הודעות קוליות</a>
            <button
                    class="navbar-toggler"
                    type="button"
                    data-mdb-toggle="collapse"
                    data-mdb-target="#navbarColor02"
                    aria-controls="navbarColor02"
                    aria-expanded="false"
                    aria-label="Toggle navigation"
            >
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse" id="navbarColor02">
                <ul class="navbar-nav me-auto mb-2 mb-lg-0">
                    <li class="nav-item active">
                        <a class="nav-link" aria-current="page" href="#">דף הבית</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="#">הקלטת קובץ קול</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="#">שליחת הודעה קולית</a>
                    </li>

                </ul>

            </div>
        </div>
    </nav>

    <hr class="my-5" />

<!--===========================================================================================================================================-->

    <div class="col mb-4 justify-content-center">

            <form method="post">
                    <textarea class="form-control" name="msg" rows="4"></textarea>
                    <label class="form-label">הזן טקסט</label>
                <button type="submit" class="btn btn-primary btn-block mb-4">שלח הודעה</button>
            </form>

<?php
if (isset($_POST['msg']))
{
    print_r($_POST);
}
?>

<!--===========================================================================================================================================-->

</div>


<script type="text/javascript" src="js/mdb.min.js"></script>
<!-- Custom scripts -->
<script type="text/javascript"></script>
</body>
</html>