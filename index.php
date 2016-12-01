<?php include 'header.php';?>

<div class="col-md-12">
    <div class="row">
    <div class="col-md-10">
      <h1> Local Restaurants </h1>
    </div>
    <div class="col-md-2">

    </div>


    </div>
    <div class="row">
      <?php
      $result = mysql_query("select *, SUM(((is_positive * 2) - 1)) as 'score'
								from Restaurant
								join Vote on Restaurant.id = Vote.restaurant_id
								group by Restaurant.id, name, url, Restaurant.submitter_id, submit_date
								order by score desc")
              or die("<p>Could not perform database query by device type types.</p>"
              . "<p>Error Code " . mysql_errno()
              . ": " . mysql_error()) . "<p>";

              if(mysql_num_rows($result) > 0)
              {
                $dataRow = mysql_fetch_row($result);
                do{


                  $tags =  mysql_query("SELECT tag_value from Tag join Tag_Restaurant_Mapping on Tag_Restaurant_Mapping.tag_id = Tag.id where Tag_Restaurant_Mapping.restaurant_id = '{$dataRow[0]}'")
                            or die("<p>Could not perform database query by device type types.</p>"
                            . "<p>Error Code " . mysql_errno()
                            . ": " . mysql_error()) . "<p>";

                  echo("<div class='panel'>
                        <div class='panel-heading'>
                            <div class='text-center'>
                                <div class='row'>
                                    <div class='col-sm-9'>
                                        <h3 class='pull-left'><a href='restaurant.php?id={$dataRow[0]}'>{$dataRow[1]}</a></h3>
                                    </div>
                                    <div class='col-sm-3'>
                                        <h4 class='pull-right'>
                                            <small><em>Submitted:{$dataRow[4]}</em></small>
                                        </h4>
                                    </div>
                                </div>
                            </div>
                        </div>

                        <div class='panel-body row'>
                            <div class='col-md-1 voteArea'>
                                <div class='row'>
                                    <span class='glyphicon glyphicon-chevron-up' aria-hidden='true'></span>
                                </div>
                                <div class='row'>
                                {$dataRow[9]}
                                </div>
                                <div class='row'>
                                    <span class='glyphicon glyphicon-chevron-down' aria-hidden='true'></span>
                                </div>

                            </div>
                            <div class='col-md-11'>

                            </div>

                        </div>
                        <div class='panel-footer'>");
                        $dataRow2 = mysql_fetch_row($tags);
                        do{


                            echo("<span class='label label-default'>{$dataRow2[0]}</span>");

                            $dataRow2 = mysql_fetch_row ($tags);
                        } while ($dataRow2);




                        echo("</div>
                    </div>");

                    $dataRow = mysql_fetch_row ($result);
                } while ($dataRow);
              }


      ?>
    </div>

</div>

<?php include 'footer.php'; ?>
