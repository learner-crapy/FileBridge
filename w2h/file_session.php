<?php
    $key = ini_get("session.upload_progress.prefix") . ini_get("session.upload_progress.name");
    var_dump($_SESSION[$key]);
?>