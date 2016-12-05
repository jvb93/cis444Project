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

  //Print tags
  $tags =  mysql_query("SELECT tag_value from Tag join Tag_Restaurant_Mapping on Tag_Restaurant_Mapping.tag_id = Tag.id where Tag_Restaurant_Mapping.restaurant_id = '{$id}'")
            or die("<p>Could not perform database query by device type types.</p>"
            . "<p>Error Code " . mysql_errno()
            . ": " . mysql_error()) . "<p>";
$tagRow = mysql_fetch_row($tags);
        do{


            echo("<span class='label label-info'>{$tagRow[0]}</span>&nbsp;");

            $tagRow = mysql_fetch_row ($tags);
        } while ($tagRow);
  //
  echo("<p><br/></p>");

  echo("<p>Submitted: $mysqldate by $dataRow[3]</p><br/>");
  echo("<a href='$dataRow[4]' target='_blank'>Visit Site</a><br/>");
  $tags =  mysql_query("SELECT tag_value from Tag join Tag_Restaurant_Mapping on Tag_Restaurant_Mapping.tag_id = Tag.id where Tag_Restaurant_Mapping.restaurant_id = '{$dataRow[0]}'")
            or die("<p>Could not perform database query by device type types.</p>"
            . "<p>Error Code " . mysql_errno()
            . ": " . mysql_error()) . "<p>";



#Checks if you're signed in to allow submitting comments
if(isset($_SESSION['userId']))
{
  #If user created this restaurant, or if user is an admin, he/she can delete it
  if($_SESSION['userId'] == $dataRow[0] OR
     $_SESSION['isAdmin'] == 1)
  {
    echo("<form action='deleteRestaurant.php' method='get'>");
    echo("<p> <input class='btn btn-danger' type ='submit' value='delete' />");
    echo("<input type='hidden' name='restaurantID' value={$id} />");
    echo("</form>");
  }

  #Add comment
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

echo("<h3>Comments</h3>");
#Showing comments for restuarant
$comments = mysql_query("SELECT User.User_Name, Comment.comment_text,
  Comment.submit_date, Comment.id FROM User JOIN Comment
  ON User.id=Comment.submitter_id WHERE Comment.restaurant_id={$id} order by Comment.Submit_Date desc");

  $num_rows = mysql_num_rows($comments);
  if ($num_rows > 0)
  {
    $row = mysql_fetch_row($comments);

    for ($row_num = 0; $row_num < $num_rows; $row_num++)
    {
      $phpdate = strtotime( $row[2] );
      $mysqldate = date( 'F j, Y g:i a', $phpdate );
      echo("<div class='panel panel-default'>
              <div class='panel-heading'>
                <strong>{$row[0]} Commented</strong> <span class='text-muted pull-right'>{$mysqldate}</span>
                </div>
                <div class='panel-body'>
                  {$row[1]}
                </div>");

      if($_SESSION['userName'] == $row[0] OR
         $_SESSION['isAdmin'] == 1)
      {
        echo("<form action='deleteComment.php' method='get'>");
        echo("<p> <input class='btn btn-danger' type ='submit' value='delete' />");
        echo("<input type='hidden' name='commentID' value={$row[3]} />");
        echo("</form>");
      }

      echo("</div>");

      $row = mysql_fetch_row($comments);
    }
   }
   else
   {
       print "No Comments <br />";
   }


?>
<?php include 'footer.php';?>
