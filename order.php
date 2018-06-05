
<?php
require('header.php');
?>

<h2>Podaj dane do wysyłki</h2>
<form action='orderSummary.php' method='post'>
Imię i nazwisko: <br><input type='text' name='customer' style='height: 30px; width: 300px;'><br><br>
E-mail: <br><input type='text' name='email' style='height: 30px; width: 300px;'><br><br>
Adres: <br><textarea name='address' style='height: 100px; width: 300px;'></textarea><br><br><br><br>
<input type='submit' value='Zamawiam i płace' style='height: 90px; width: 300px;'>
</form>

<?php              
require('footer.php');
?>