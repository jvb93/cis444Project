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
#Checks if you're signed in to allow submitting comments
if(isset($_SESSION['userId']))
{
  echo ("

  <div id= 'restaurantName'>
    <div class='col-md-12'>

      <div class= 'row'><div class='col-md-12'><div class='well'><h1>Add Comment</h1>
        <form action = 'addComment.php' method = 'post'>
          <p>
            <input type='hidden' value='$id' name='restaurantID'></input>
            <textarea name='comment' rows='4' cols='110'>

            </textarea>
          </p>
          <input type = 'submit' value = 'Submit' />
          </form>
      </div></div>
      </div>
    </div>
      ");
}
#Showing comments for restuarant
$comments = mysql_query("SELECT User.User_Name, Comment.comment_text,
  Comment.submit_date FROM User JOIN Comment
  ON User.id=Comment.submitter_id WHERE Comment.restaurant_id={$id}");

  $num_rows = mysql_num_rows($comments);
  if ($num_rows > 0)
  {
    $row = mysql_fetch_assoc($comments);
    $num_fields = mysql_num_fields($comments);
    $keys = array_keys($row);
    for ($index = 0; $index < $num_fields; $index++)
    {
      print  $keys[$index] . "   ";
    }
    print "<br />";
    for ($row_num = 0; $row_num < $num_rows; $row_num++)
    {
      print "<br />";
      $values = array_values($row);
      for ($index = 0; $index < $num_fields; $index++)
        {
          $value = htmlspecialchars($values[$index]);
          print $value. "    ";
        }
      print "<br />";
      $row = mysql_fetch_assoc($comments);
    }
   }
   else
   {
       print "There are no rows in the table <br />";
   }




?>
<?php include 'footer.php';?>
=======
<?php include 'header.php';?>

<?php

  echo("<h1>Wow, restaurant {$_GET['id']}</h1>");
?>

<?php include 'footer.php';?>
