<?php include 'header.php';?>

<?php
$id=$_GET['id'];

$result = mysql_query("select submitter_id, name, submit_date, User.User_Name, URL from Restaurant join User on Restaurant.submitter_id = User.id where Restaurant.id=$id")
        or die("<p>Could not perform database query.</p>"
        . "<p>Error Code " . mysql_errno()
        . ": " . mysql_error()) . "<p>";
$dataRow = mysql_fetch_row($result);

  echo("<h1>$dataRow[1]</h1>");
  $phpdate = strtotime( $dataRow[2] );
  $mysqldate = date( 'F j, Y g:i a', $phpdate );
  echo("<p>Submitted: $mysqldate by $dataRow[3]</p><br/>");
  echo("<a href='$dataRow[4]' target='_blank'>Visit Site</a><br/>");
  $tags =  mysql_query("SELECT tag_value from Tag join Tag_Restaurant_Mapping on Tag_Restaurant_Mapping.tag_id = Tag.id where Tag_Restaurant_Mapping.restaurant_id = '{$dataRow[0]}'")
            or die("<p>Could not perform database query by device type types.</p>"
            . "<p>Error Code " . mysql_errno()
            . ": " . mysql_error()) . "<p>";




  if(isset($_SESSION['userName']))	//If the session is already started.
  {
    if($_SESSION['userId'] == $dataRow[0] OR
       $_SESSION['isAdmin'] == 1)
    {
      echo("<form action='deleteRestaurant.php' method='get'>");
      echo("<p><input type ='submit' value='delete' />");
      echo("<input type='hidden' name='restaurantID' value={$id} />");
      echo("</form>");
    }
  }


?>
<?php include 'footer.php';?>
