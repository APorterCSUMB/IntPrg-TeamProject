<?php
    $dsn = 'mysql: host=https://intprg-wspace-aporter87.c9users.io/;port=3306;dbname=TeamProject';
    $options = array(PDO::MYSQL_ATTR_INIT_COMMAND => 'SET NAMES utf8');
    $user = "aporter87";
    $pass = "";
    $sql = '**NO DB HANDLE**';
    $flag = false;
    try {
        $sql = new PDO($dsn, $user, $pass, $options);
        $sql -> setAttribute(PDO::ATTR_DEFAULT_FETCH_MODE, PDO::FETCH_ASSOC);
        $flag = true;
    } catch (PDOException $x) {
        echo '<div style="color:green;font-weight:bold;">--> Unable to connect to SQL DB!</div>';
    }
    
    





?>