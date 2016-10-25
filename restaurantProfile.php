<?php include 'header.php';?>
<div id ="main">
<div id= "restaurantName">
    <div class="col-md-12">
      <div class="row">
          <div class="col-md-12"><div class="well"><h1>Restaurant Name</h1></div></div>
      </div>
      <div class="row">
          <div class="col-md-6"><div class="well">
            <p> Restaurant's Distance, Rating, Price, etc. </p>
            <p> Resturant's Bio: Description, History, Deal's, Phone Numbers, Address, etc. </p>
            <p> (Link to Restaurant's website if available) </p>
            <form id = "commentForm" action = "">
              <label for"Comment Box">Comment:</label>
              <textarea class="form-control" rows="3"></textarea>
              <input type = "submit" value = "Submit" />
            </form>
            <div class = "comment">
              <h6> Username1 </h6>
              <p> I like this restaurant looooooool </P>
            </div>

          </div></div>
          <div class="col-md-3"><div class="well">
          <p>
            <img src = "" alt = "'Picture of Place on Map'" />
          </br>
            <img src = "" alt = "'Picture of Restaurant'" />
          </p>
          </div></div>

          <div class="col-md-3"><div class="well">
            <h4> Suggested Restaurants: </h4>

            <div class = "suggestedRestaurant">
              <h6> Suggested Restaurant 1 </h6>
              <p>
                <img src = "" alt = "'Picture of Suggested Restaurant'" />
              </p>
            </div>

            <div class = "suggestedRestaurant">
              <h6> Suggested Restaurant 2 </h6>
              <p>
                <img src = "" alt = "'Picture of Suggested 2 Restaurant'" />
              </p>
            </div>

        </div></div>
      </div>



</div>
<?php include 'footer.php'; ?>
