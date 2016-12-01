<?php include 'header.php';?>

<?php
$id=$_GET["restaurantID"];
mysql_query("DELETE FROM Restaurant WHERE id=$id");

echo("Restaurant {$id} deleted.");
?>

<?php include 'footer.php';?>
