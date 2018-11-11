<?php
    //$base_url = 'http://www.lazier.hol.es';
	//$base_url = 'http://localhost:8080/shit';
	//$base_url = 'http://localhost/shit';
	$base_url = 'https://csexpo.tech/aboitiz';
    session_start();

    $default_username = 'aboitizadmin';
    $default_password = md5('password');

    $serverName = 'mysql.hostinger.ph';
    #$serverName = 'localhost';
    $phpmyadmin_username = 'u116947582_expo';
	//$phpmyadmin_username = 'root';
    $phpmyadmin_password = '3xp03xp0';
	//$phpmyadmin_password = '';
    $db_name = 'u116947582_expo';
	//$db_name = '';
    $conn = new mysqli($serverName, $phpmyadmin_username, $phpmyadmin_password, $db_name);
    $db_name = 'u116947582_expo';
    $uri = $_SERVER['REQUEST_URI'];
    //echo $uri; // Outputs: URI
    
    $protocol = ((!empty($_SERVER['HTTPS']) && $_SERVER['HTTPS'] != 'off') || $_SERVER['SERVER_PORT'] == 443) ? "https://" : "http://";
    
    $url = $protocol . $_SERVER['HTTP_HOST'] . $_SERVER['REQUEST_URI'];
    $uriSegments = explode('/', $url);
    /*
    echo $url; // Outputs: Full URL
    echo '<br/>';
    echo json_encode($uriSegments);
    /*
    foreach($uriSegments as $r){
        echo $r;
    }
    echo '<br/>';
    $last = end($uriSegments);
    echo $last;
    //$last = '';
    */
    $last = $uriSegments[count($uriSegments)-2];

    function printLines($num){
        $str = '';
        for($i = 0; $i < $num; $i++){
            $str .= '-';
        }
        return $str;
    }

    function getInitials($string){
        $arr = explode(' ', $string);
        $initials = '';
        for($i = 0; $i < count($arr); $i++){
            $initials .= strtoupper($arr[$i][0]);
        }
        return $initials;
    }
    
?>