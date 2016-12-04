<?php include 'header.php';?>

<?php
  $id = $_GET['id'];
  $user = $_SESSION['userId'];
  $result = mysql_query( "SELECT is_positive FROM Vote WHERE submitter_id = $user AND restaurant_id = $id ");


  if(mysql_num_rows($result)> 0){
    $datarow = mysql_fetch_row($result);

        if ($datarow[0] == 0){
        // do nothing
        }
        else{
          mysql_query("UPDATE Vote SET is_positive = 0 WHERE submitter_id = $user AND restaurant_id = $id");
        }

    }
    else {
      mysql_query("INSERT INTO Vote(is_positive, submitter_id, restaurant_id) VALUES (0, '$user', '$id')");
    }

 ?>

<?php include 'footer.php';?>
