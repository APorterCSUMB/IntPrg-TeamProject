


<?php

    // NO TEAM MEMBER SHALL EDIT THIS FILE WITHOUT CONFERENCING THE REST OF THE TEAM FIRST
    // YOU WILL BE FIRED AND WE WILL TAKE BACK ALL OF YOUR BONUS PAY FROM THE LAST SIX MONTHS
    
    $host = getenv('IP');
    $port = 3306;
    $db = "TeamProject";
    $user = "agonz8849";
    $pass = "GBABalo";
    $sql = '**NO DB HANDLE**';
    $flag = false;
    try {
        $sql = new PDO('mysql: host='.$host.';dbname='.$db.';port='.$port.';', $user, $pass);
        $sql -> setAttribute(PDO::ATTR_DEFAULT_FETCH_MODE, PDO::FETCH_ASSOC);
        $flag = true;
    } catch (PDOException $x) {
        echo '<div style="color:green;font-weight:bold;">--> Unable to connect to SQL DB!</div>';
    }

?>