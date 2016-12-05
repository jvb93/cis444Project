<?php include"phpFunctions/session.php"; ?>
<?php include"header.php"; ?>
<?php

$restaurantName = $_POST['restaurantName'];
$url = $_POST['restaurantSite'];
$userName = $_SESSION['userId'];
$tag = $_POST['tag'];
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
  $query = mysql_query("SELECT id from Tag where tag_value = '$tagList[$i]' ");
   //if tag exists just grab tag ID
  if(mysql_num_rows($query)>0){

    $tagRow = mysql_fetch_row($query);
  }

  //if tag doesnt exist, insert tag and grab the generated tag id
  else{
  $sql = mysql_query("insert into tag(tag_value) values('{$tagList[$i]}')");
   $tagID = mysql_query("SELECT id from Tag where tag_value = '$tagList[$i]'");
   $tagRow = mysql_fetch_row($tagID);

  }
}


 //map the tag with the restaurant in the Tag_Restaurant_Mapping
 $sql = mysql_query("insert into Tag_Restaurant_Mapping(restaurant_id,tag_id) values('{$restaurant[0]}','{$tagRow[0]}'");


$sql = mysql_query("insert into Vote(is_positive, submitter_id, restaurant_id) values(1,{$userName},{$restaurant[0]})");

header("Location: restaurant.php?id={$restaurant[0]}");

?>
<?php include"footer.php"; ?>
