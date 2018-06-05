
<?php
require('header.php');
?>

<?php
function showProducts($id) {
    global $pdo;
    
    $stmt = $pdo->prepare("SELECT * FROM products WHERE  id=:id");
    $stmt->bindValue(':id', $id, PDO::PARAM_INT);
    $stmt->execute();
    
    while($row = $stmt->fetch(PDO::FETCH_ASSOC)) {
          echo "<div>";
          echo "<center>";
          echo "<img src='images/".$row['index'].".jpg'"."<br/>";
          echo "<h1>".$row['name']."</h1>"."</br>";
          echo "<h2>"."Cena netto: ".$row['net_price']." zł "."</h2>"."</br>";
          echo $row['description'];
          echo "<br><br>";
          $id = $row['id'];
          echo "<a href='addToCart.php?id=$id'>Dodaj do koszyka</a>";
          echo "</center>";
          echo "</div>";
      }
}
if(isset($_GET['product_id'])) {
    showProducts($_GET['product_id']);
}

?>


<?php              
require('footer.php');
?>