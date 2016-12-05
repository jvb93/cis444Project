<?php include 'header.php';?>

<?php
$commentID=$_GET["commentID"];
mysql_query("DELETE FROM Comment WHERE id=$commentID");

echo("Comment {$commentID} deleted.");

header('Location: ' . $_SERVER['HTTP_REFERER']);
?>

<?php include 'footer.php';?>
