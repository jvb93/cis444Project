<?php include 'header.php';?>

<?php
$id=$_GET['id'];
$result = mysql_query("select Restaurant.submitter_id, name, submit_date, User.User_Name, URL, SUM(((is_positive * 2) - 1)) as 'score' from Restaurant	join Vote on Restaurant.id = Vote.restaurant_id join User on Restaurant.submitter_id = User.id where Restaurant.id=$id")
        or die("<p>Could not perform database query.</p>"
        . "<p>Error Code " . mysql_errno()
        . ": " . mysql_error()) . "<p>";
$dataRow = mysql_fetch_row($result);
echo("<div class='row'><div class='c ol-md-12'><h1><a href='$dataRow[4]' target='_blank'>{$dataRow[1]}</a><small class='pull-right'>User score: {$dataRow[5]}</small></h1></div></div>");


  $phpdate = strtotime( $dataRow[2] );
  $mysqldate = date( 'F j, Y g:i a', $phpdate );

  //Print tags
  $tags =  mysql_query("SELECT tag_value from Tag join Tag_Restaurant_Mapping on Tag_Restaurant_Mapping.tag_id = Tag.id where Tag_Restaurant_Mapping.restaurant_id = '{$id}'")
            or die("<p>Could not perform database query by device type types.</p>"
            . "<p>Error Code " . mysql_errno()
            . ": " . mysql_error()) . "<p>";
  echo("<div class='row'><p>Submitted: $mysqldate by $dataRow[3]</p>");

  echo("</div>");

$tagRow = mysql_fetch_row($tags);
        do{


            echo("<span class='label label-info'>{$tagRow[0]}</span>&nbsp;");

            $tagRow = mysql_fetch_row ($tags);
        } while ($tagRow);



  $tags =  mysql_query("SELECT tag_value from Tag join Tag_Restaurant_Mapping on Tag_Restaurant_Mapping.tag_id = Tag.id where Tag_Restaurant_Mapping.restaurant_id = '{$dataRow[0]}'")
            or die("<p>Could not perform database query by device type types.</p>"
            . "<p>Error Code " . mysql_errno()
            . ": " . mysql_error()) . "<p>";




#Checks if you're signed in to allow submitting comments
if(isset($_SESSION['userId']))
{

  #Add comment
  echo ("
  <div id= 'restaurantName'>
    <div class='col-md-12'>

      <div class= 'row'><div class='col-md-12'><div class='well'><h3>Add Comment</h3>
        <form action = 'addComment.php' method = 'post'>
          <p>
            <input type='hidden' value='$id' name='restaurantID'></input>
            <textarea name='comment' rows='4' cols='110'>

            </textarea>
          </p>
          <input type = 'submit' value = 'Submit' class='btn btn-primary' />
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
                </div>
                <div class='panel-footer'>");

         if(isset($_SESSION['userName']))
         {
           if($_SESSION['userName'] == $row[0] OR
              $_SESSION['isAdmin'] == 1)
           {
             echo("<form action='deleteComment.php' method='get'>");
             echo("<input class='btn btn-xs btn-danger' style='right:0px;' type ='submit' value='delete' />");
             echo("<input type='hidden' name='commentID' value={$row[3]} />");
             echo("</form>");
           }
         }


      echo("</div></div>");

      $row = mysql_fetch_row($comments);
    }
   }
   else
   {
       print "No Comments <br />";
   }



   if(isset($_SESSION['userName']))	//If the session is already started.
   {
     if($_SESSION['userId'] == $dataRow[0] OR
        $_SESSION['isAdmin'] == 1)
     {
       echo("<form action='deleteRestaurant.php' class='' method='get'>");
       echo("<p> <input class='btn btn-danger form-control' type ='submit' value='Delete Restaurant' />");
       echo("<input type='hidden' name='restaurantID' value={$id} />");
       echo("</form>");
     }
   }


?>
<?php include 'footer.php';?>
