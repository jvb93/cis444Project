<?php include 'header.php';?>

<?php
$id=$_GET["restaurantID"];

$comments = mysql_query("SELECT id FROM Comment WHERE restaurant_id=$id");
$votes = mysql_query("SELECT id FROM Vote WHERE restaurant_id=$id");
$tags = mysql_query("SELECT id FROM Tag_Restaurant_Mapping WHERE restaurant_id=$id");

#Delete all comments for this restaurant
$num_rows = mysql_num_rows($comments);
if ($num_rows > 0)
{
  $row = mysql_fetch_row($comments);
  for ($row_num = 0; $row_num < $num_rows; $row_num++)
  {
    mysql_query("DELETE FROM Comment WHERE id=$row[0]");
    $row = mysql_fetch_row($comments);
  }
}

#Delete all votes for this restaurant
$num_rows = mysql_num_rows($votes);
if ($num_rows > 0)
{
  $row = mysql_fetch_row($votes);
  for ($row_num = 0; $row_num < $num_rows; $row_num++)
  {
    mysql_query("DELETE FROM Vote WHERE id=$row[0]");
    $row = mysql_fetch_row($votes);
  }
}

#Delete all tags for this restaurant
$num_rows = mysql_num_rows($tags);
if ($num_rows > 0)
{
  $row = mysql_fetch_row($tags);
  for ($row_num = 0; $row_num < $num_rows; $row_num++)
  {
    mysql_query("DELETE FROM Tag_Restaurant_Mapping WHERE id=$row[0]");
    $row = mysql_fetch_row($tags);
  }
}

mysql_query("DELETE FROM Restaurant WHERE id=$id");
echo("Restaurant {$id} deleted.");
?>

<?php include 'footer.php';?>
