<?php include 'header.php';?>

<?php
$id=$_GET['id'];
  echo("<h1>Wow, restaurant {$id}</h1>");

  $result = mysql_query("SELECT Submitter_Id FROM Restaurant WHERE id=$id")
          or die("<p>Could not perform database query.</p>"
          . "<p>Error Code " . mysql_errno()
          . ": " . mysql_error()) . "<p>";
  $dataRow = mysql_fetch_row($result);

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
