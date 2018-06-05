
<?php
require('header.php');
?>

<h1>Twoj koszyk: </h1>
<table border>
<?php

$inCart = $cart->getProducts();

echo "<br><br>"; 
echo "<tr align='center' valign='middle'><td>Indeks</td><td>Nazwa produktu</td><td>Cena netta</td><td>Ilość</td><td>Wartość netto</td></td></tr>";    
    
$sum = 0;    
foreach ($inCart as $product) {
    $productCartId = $product['id'];
    $net_price = $product['net_price'];
    $quantity = $product['quantity'];
    $index = $product['index'];
    $name = $product['name'];
    $total = $quantity * $net_price;
    $id = $product['pid'];
    $sum+= $total;
    
    $plus = "<a href='addToCart.php?id=$id'>+</a>";
    $minus = "<a href='remFromCart.php?id=$id'>-</a>";
    
    echo "<tr align='center' valign='middle'><td>$index</td><td>$name</td><td>$net_price</td><td>$quantity $plus $minus </td><td>$total</td><td></td></tr>"; 
}      
?>  
    
</table>

<h2>Wartość Twojego koszyka: <?php echo $sum." zł netto"; ?></h2>
<center><h2><a href='order.php'>Złoż zamowienie</a></h2></center>
<?php              
require('footer.php');
?>