
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="style.css">
    <title>Sklep</title>

<header>
    <h1>Kuchania orientalna</h1>
</header>

<?php

require('functions.php');  
require('session.php');
require('request.php');
require('user.php');
require('cart.php');

        $options = array (
        PDO::MYSQL_ATTR_INIT_COMMAND, "SET_NAMES 'UTF8'",
        PDO::ATTR_ERRMODE, PDO:: ERRMODE_EXCEPTION
      );
     
      $pdo = new PDO('mysql:host=localhost;dbname=Sklep', 'root', 'root', $options);
      //echo "<br/>"."<br/>".'Połączenie nawiązane!'."<br/>"."<br/>";

$request = new userRequest;
$session = new Session;
$cart = new Cart;
?>
<div id="content">
      <div id='menu'>
      <?php showMenu(); ?>
      </div>
<div id='products'>
    
     