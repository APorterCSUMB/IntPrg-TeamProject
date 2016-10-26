<?php
    $host = getenv("IP");
    $port = 3306;
    $db = "Lab5";
    $user = getenv('C9_USER');
    $pass = "";
    $sql = '**NO DB HANDLE**';
    $flag = false;
    try {
        $sql = new PDO('mysql:host='.$host.';dbname='.$db.';port='.$port.';', $user, $pass);
        $sql -> setAttribute(PDO::ATTR_DEFAULT_FETCH_MODE, PDO::FETCH_ASSOC);
        $flag = true;
    } catch (PDOException $x) {
        echo '<div style="color:green;font-weight:bold;">--> Unable to connect to SQL DB!</div>';
    }
?>