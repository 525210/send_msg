<?php
$active_class = $_SERVER['SCRIPT_NAME'];
$success = "btn btn-outline-success";
$warning = "btn btn-outline-warning";
?>
<!DOCTYPE html>
<html lang="he" dir="rtl">
<head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no"/>
    <meta http-equiv="x-ua-compatible" content="ie=edge" />
    <title>הודעות קוליות</title>
    <link rel="icon" href="img/audacity.ico" type="image/x-icon" />
    <!-- Font Awesome -->
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.15.2/css/all.css" />
    <!-- Google Fonts Roboto -->
    <link rel="stylesheet" href="https://fonts.googleapis.com/css2?family=Roboto:wght@300;400;500;700&display=swap" />
    <!-- Dark MDB theme -->
    <link rel="stylesheet" href="css/mdb.dark.min.css" />

</head>
<body>


<div class="container my-5">
    <nav class="navbar navbar-expand-lg navbar-dark bg-dark shadow-5-strong">
        <div class="container-fluid">
            <a class="navbar-brand" href="/">מערכת הודעות קוליות</a>
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
                    <li class="nav-item">
                        <a class="nav-link <?php if ($active_class == '/index.php'){echo 'active';}?>" aria-current="page" href="/">דף הבית</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link <?php if ($active_class == '/add_records.php'){echo 'active';}?>" href="add_records.php">ליצור הודעה חדשה</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link <?php if ($active_class == '/send_msg.php'){echo 'active';}?>" href="send_msg.php">שליחת הודעה קולית</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link <?php if ($active_class == '/call_statistics.php'){echo 'active';}?>" href="call_statistics.php">סטטיסטיקת שיחות</a>
                    </li>

                </ul>

            </div>
        </div>
    </nav>

    <hr class="my-5" />