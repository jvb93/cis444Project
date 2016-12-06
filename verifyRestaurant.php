<?php include"phpFunctions/session.php"; ?>
<?php include"header.php"; ?>
<?php

$restaurantName = sanitize_sql_string($_POST['restaurantName']);
$url = sanitize_sql_string($_POST['restaurantSite']);
$userName = sanitize_sql_string($_SESSION['userId']);
$tag = sanitize_sql_string($_POST['tag']);
$tagList = explode(",",$tag);

$sql = mysql_query("insert into Restaurant(Name, URL,Submitter_Id,Submit_Date) values('{$restaurantName}','{$url}','{$userName}', NOW())")
or die("<p>Could not perform database query for user login.</p>"
 . "<p>Error Code " . mysql_errno()
 . ": " . mysql_error()) . "<p>";

 //get the restaurant ID
 $restaurantID = mysql_query("SELECT id from Restaurant where Name = '$restaurantName'");
 $restaurant = mysql_fetch_row($restaurantID);

//handle tags
for($i = 0; $i < count($tagList); ++$i) {
    $sql2 = mysql_query("insert into Tag(tag_value) values('{$tagList[$i]}')")
    or die("<p>Could not perform database query for user login.</p>"
     . "<p>Error Code " . mysql_errno()
     . ": " . mysql_error()) . "<p>";

    $tagID = mysql_query("SELECT id from Tag where tag_value = '$tagList[$i]'");
    $tagRow = mysql_fetch_row($tagID);
    $sql3 = mysql_query("insert into Tag_Restaurant_Mapping(restaurant_id,tag_id) values('{$restaurant[0]}','{$tagRow[0]}')");
}


 //map the tag with the restaurant in the Tag_Restaurant_Mapping

 

$sql4 = mysql_query("insert into Vote(is_positive, submitter_id, restaurant_id) values(1,{$userName},{$restaurant[0]})");

header("Location: restaurant.php?id={$restaurant[0]}");

?>
<?php include"footer.php"; ?>
