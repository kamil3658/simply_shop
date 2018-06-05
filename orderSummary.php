
<?php
require('header.php');
?>

<?php
//zapisz informacje o zamowieniu do DB
$stmt = $pdo->prepare('INSERT INTO orders (id, customer, email, address) VALUES (null, :customer, :email, :address)');
$stmt->bindValue(':customer', $_POST['customer'], PDO::PARAM_STR);
$stmt->bindValue(':email', $_POST['email'], PDO::PARAM_STR);
$stmt->bindValue(':address', $_POST['address'], PDO::PARAM_STR);
$stmt->execute();

$orderId = $pdo->lastInsertId();

$orderedProducts = $cart->getProducts();

foreach ($orderedProducts as $products) {
    $pid = $products['pid'];
    $qty = $products['quantity'];

    $stmt = $pdo->prepare('INSERT INTO ordersproducts (id, order_id, product_id, quantity) VALUES (null, :orderId, :pid, :qty)');
    $stmt->bindValue(':orderId', $orderId, PDO::PARAM_INT);
    $stmt->bindValue(':pid', $pid, PDO::PARAM_INT);
    $stmt->bindValue(':qty', $qty, PDO::PARAM_INT);
    $stmt->execute();
}

$cart->clear();

echo "<h2>Dziękujemy za złożenie zamowienia :) </h2>";
//wyslij maila potwierdzajacego

//mail($_POST['address'], "Zamowienie numer $orderId", "Potwierdzamy złożenie zamowienia");
?>

<?php              
require('footer.php');
?>