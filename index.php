<?php include 'header.php';?>
<input type="hidden" id="php_sess" value="<?php echo(isset($_SESSION['userId'])); ?>">
<div class="col-md-12">
    <div class="row">
    <div class="col-md-10" style="padding-left:0px;">
      <h1> Local Restaurants </h1>
    </div>
    <div class="col-md-2">
    </div>
    </div>
    <div class="row">

      <?php
        if(isset($_POST['searchQuery']))
        {
          $searchQuery=$_POST["searchQuery"];

          $tags = explode(" ",$searchQuery);
          $tag = $tags[0];

          sanitize_paranoid_string($tag);
          echo("<h3>Results for \"{$tag}\":</h3>");
          $tagQuery =   "select * from (select Restaurant.id, Restaurant.Name, Restaurant.submit_date, Restaurant.URL, SUM(((is_positive * 2) - 1)) as 'score' from Tag join Tag_Restaurant_Mapping on Tag.id = Tag_Restaurant_Mapping.tag_id join Restaurant on Restaurant.id = Tag_Restaurant_Mapping.restaurant_id join Vote on Restaurant.id = Vote.restaurant_id where tag_value like '%{$tag}%'  group by Restaurant.id, Restaurant.Name, Restaurant.submit_date, Restaurant.URL order by score desc) t where score is not null";



          /*
          NOTES: select * from Restaurant, Tag_Restaurant_Mapping where Tag_Restaurant_Mapping.tag_id = (select id from Tag where tag_value='$searchQuery');


          select *, SUM(((is_positive * 2) - 1)) as 'score'
          from
          (select * from Restaurant, Tag, Tag_Restaurant_Mapping where Tag_Restaurant_Mapping.tag_id = (select Tag.id from Tag where tag_value='Beer')) as filtered
          join Vote on Restaurant.id = Vote.restaurant_id group by Restaurant.id, name, url, Restaurant.submitter_id, submit_date
          order by score desc;
          */

          $result = mysql_query($tagQuery)
          or die("<p>Could not perform database query by device type types.</p>"
          . "<p>Error Code " . mysql_errno()
          . ": " . mysql_error()) . "<p>";

          }
				  else {
      $result = mysql_query("select Restaurant.id, Restaurant.Name, Restaurant.submit_date, Restaurant.URL, SUM(((is_positive * 2) - 1)) as 'score'
								from Restaurant
								join Vote on Restaurant.id = Vote.restaurant_id
								group by Restaurant.id, name, url, Restaurant.submitter_id, submit_date
								order by score desc")
              or die("<p>Could not perform database query by device type types.</p>"
              . "<p>Error Code " . mysql_errno()
              . ": " . mysql_error()) . "<p>";
				  }



              if(mysql_num_rows($result) > 0)
              {
                $dataRow = mysql_fetch_row($result);


                do{


                  $tags =  mysql_query("SELECT tag_value from Tag join Tag_Restaurant_Mapping on Tag_Restaurant_Mapping.tag_id = Tag.id where Tag_Restaurant_Mapping.restaurant_id = '{$dataRow[0]}'")
                            or die("<p>Could not perform database query by device type types.</p>"
                            . "<p>Error Code " . mysql_errno()
                            . ": " . mysql_error()) . "<p>";
                  if(isset($_SESSION['userId']))
                  {
                    $votes =  mysql_query("SELECT is_positive from Vote where Vote.restaurant_id = '{$dataRow[0]}' and Vote.submitter_id = {$_SESSION['userId']}")
                              or die("<p>Could not perform database query by device type types.</p>"
                              . "<p>Error Code " . mysql_errno()
                              . ": " . mysql_error()) . "<p>";


                    if(mysql_num_rows($votes) > 0)
                    {
                         $voteRow = mysql_fetch_row($votes);
                         $positive = $voteRow[0];
                    }
                  }


                  $phpdate = strtotime( $dataRow[2] );
                  $mysqldate = date( 'F j, Y g:i a', $phpdate );
                  # start restaurant panel
                  echo("<div class='panel'>
                        <div class='panel-heading'>
                            <div class='text-center'>
                                <div class='row'>

                                    <div class='col-sm-12'>
                                        <h4 class='pull-right'>
                                            <small><em>Submitted: {$mysqldate}</em></small>
                                        </h4>
                                    </div>
                                </div>
                            </div>
                        </div>

                        <div class='panel-body row'>
                            <div class='col-md-1 voteArea'>
                                <div class='row'>");
                          # check to see if the user has voted for this restaurant, highlight their vote if they have
                          if(mysql_num_rows($votes) > 0))
                          {

                            # if they voted and it was an upvote, make the up arrow red
                            if($positive == 1)
                            {
                              echo("<a href='#' class='voteLink'><span class='glyphicon glyphicon-chevron-up vote upVote text-success' aria-hidden='true' data-id='{$dataRow[0]}'></span></a>
                              </div>
                              <div class='row text-success score'>
                              {$dataRow[4]}
                              </div>
                              <div class='row'>
                              <a href='#' class='voteLink'><span class='glyphicon glyphicon-chevron-down downVote vote' aria-hidden='true' data-id='{$dataRow[0]}'></span></a>
                              </div>");
                            }
                              # if they voted and it was a downvote, make the down arrow blue
                            else
                            {
                              echo("<a href='#' class='voteLink'><span class='glyphicon glyphicon-chevron-up vote upVote' aria-hidden='true' data-id='{$dataRow[0]}'></span></a>
                              </div>
                              <div class='row text-danger score'>
                              {$dataRow[4]}
                              </div>
                              <div class='row'>
                              <a href='#' class='voteLink'><span class='glyphicon glyphicon-chevron-down downVote vote text-danger data-id='{$dataRow[0]}' aria-hidden='true'></span></a>
                              </div>");
                            }

                          }
                          #if this user hasn't voted for this restaurant, don't highlight an up or down arrow
                          else
                          {
                            echo("<a href='#' class='voteLink'><span class='glyphicon glyphicon-chevron-up vote upVote' aria-hidden='true' data-id='{$dataRow[0]}'></span></a>
                            </div>
                            <div class='row text-muted score'>
                            {$dataRow[4]}
                            </div>
                            <div class='row'>
                            <a href='#' class='voteLink'><span class='glyphicon glyphicon-chevron-down downVote vote' aria-hidden='true' data-id='{$dataRow[0]}'></span></a>
                            </div>");
                          }

                          # make the panel footer
                          echo("</div>
                          <div class='col-md-11'>
                            <h2 class='pull-left restaurantLink'><a href='{$dataRow[3]}' target='_blank'> {$dataRow[1]}</a></h2>
                          </div>
                          </div>
                          <div class='panel-footer'>");

                        $dataRow2 = mysql_fetch_row($tags);
                        do{


                            echo("<span class='label label-info'>{$dataRow2[0]}</span>&nbsp;");

                            $dataRow2 = mysql_fetch_row ($tags);
                        } while ($dataRow2);



                        # close panel footer, closing the panel
                        echo("<a href='restaurant.php?id={$dataRow[0]}' class='btn btn-primary btn-xs pull-right'>view comments</a></div>
                    </div>");

                    $dataRow = mysql_fetch_row ($result);
                } while ($dataRow);
              }
      ?>
    </div>

</div>

<?php include 'footer.php'; ?>
