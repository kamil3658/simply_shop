  <?php

require ('header.php');

function showCategory($category_id = null) {
    global $pdo;
    
    if($category_id) {
        $stmt = $pdo->prepare("SELECT * FROM products WHERE category_id = :cid");
        $stmt->bindValue(':cid', $category_id, PDO::PARAM_INT);
        $stmt->execute();
    }
    else {
        $stmt = $pdo->prepare("SELECT * FROM products");
        $stmt->execute();
    }
    
    echo "<table>";
    while($row = $stmt->fetch(PDO::FETCH_ASSOC)) {
          echo "<tr><td>";
          $id = $row['id'];
          echo "<img src='images/thumbs/".$row['index'].".jpg'";
          echo "</td><td>";
          echo "<a href='products.php?product_id=$id'>";
          echo $row['name'];
          echo "</a>";
          echo "</td><td>";
          echo "Cena netto: ".$row['net_price']." zł ";
          echo "</td></tr>";
      }
    echo "</table>";
}    
      if (isset($_GET['cat_id'])) {
          $category_id = $_GET['cat_id'];
      }
      else {
          $category_id = null;
      }
      showCategory($category_id);

require('footer.php');
?>
