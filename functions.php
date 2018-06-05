<?php

define('SESSION_COOKIE', 'cookiesklep');
define('SESSION_ID_LENGHT', 40);
define('SESSION_COOKIE_EXPIRE', 3600);

function showMenu() {
    global $pdo;
    
    $stmt = $pdo->prepare("SELECT * FROM categories");
    $stmt->execute();
    
    echo "<a href='index.php'>Strona głowna"."<br>";
    
    while($row = $stmt->fetch(PDO::FETCH_ASSOC)) {
        $name = $row['name'];
        $id = $row['id'];
        echo "<a href='index.php?cat_id=$id'>$name</a>"."</br>";
    }
    
    echo "<br><br>";
    echo "<a href='showcart.php'>Koszyk</a>";
    
    echo "</div>";
} 

function random_session_id() {
    $utime = time();
    $id = random_salt(40 - strlen($utime)).$utime;
    return $id;
}

function random_salt($len) {
    return random_text($len);
}

function random_text($len) {
    $base = 'QWERTYUIOPASDFGHJKLZXCVBNMqwertyuiopasdfghjklzxcvbnm1234567890';
    $max = strlen($base) - 1;
    $rstring = '';
    mt_srand((double) microtime()*1000000);
    while(strlen($rstring) < $len)
        $rstring.=$base[mt_rand(0, $max)];
    return $rstring;
}




?>