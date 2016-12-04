<?php include"phpFunctions/session.php"; ?>
<?php include"header.php"; ?>
<?php

$restaurantName = $_POST['restaurantName'];
$url = $_post['restaurantSite'];
$userName = $_SESSION['userId'];
$tag = $_post['tag'];
$tagList = explode(",",$tag);
$sql = mysql_query("insert into Restaurant(Name, URL,Submitter_Id,Submit_Date) values('{$restaurantName}','{$url}','{$userName}', NOW())")
or die("<p>Could not perform database query for user login.</p>"
 . "<p>Error Code " . mysql_errno()
 . ": " . mysql_error()) . "<p>";

 //get the restaurant ID
 $restaurantID = mysql_query("SELECT id from Restaurant where Name = '{$restaurantName}'");

//handle tags
 foreach($tagList as &$tagValue){
  //if tag exists just grab tag ID
 if(mysql_num_rows($tagValue)>0){
   $tempTagID = mysql_query("SELECT id from Tag where tag_value = '{$tagValue}'");
 }

 //if tag doesnt exist, insert tag and grab the generated tag id
 else{
 $sql = mysql_query("insert into tag(tag_value) values('{$tagValue}')")
 $tagID = mysql_query("SELECT id from Tag where tag_value = '{$tagValue}'");
 }

 //map the tag with the restaurant in the Tag_Restaurant_Mapping
 $sql = mysql_query("insert into Tag_Restaurant_Mapping(restaurant_id,tag_id) values('{$restaurantID}','{$tempTagID}'")
}

//query restaurant ID
$restaurantID = mysql_query("SELECT id from Restaurant where URL = '{$url}'");

//insert a positibe vote
$sql = mysql_query("insert into Vote(is_positive) values(1)");

header("Location: restaurant.php? where id =". $restaurantID);

/////////////////////////////////

?>
<?php include"footer.php"; ?>
