<?php include 'header.php';?>
<div id ="main">

<div id= "restaurantName">
  <div class="col-md-12">

    <div class="row">
        <div class="col-md-12"><div class="well"><h1>Add Restaurant</h1>
          <form id = "commentForm" action = "">
            <p>
            <label> Restaurant Name:
            <input type "text" id = "restaurantName" />
          </label>
        </br>
          <label> Address:
          <input type "text" id = "restaurantAddress" />
          </label>
        </br>
          <label> City:
          <input type "text" id = "restaurantCity" />
          </label>
        </br>
          <label> State:
          <input type "text" id = "restaurantState" />
          </label>
        </br>
          <label> Zip Code:
          <input type "text" id = "restaurantZip" />
          </label>
        </br>
          <label> Website:
          <input type "text" id = "restaurantSite" />
          </label>
        </br>
        <label>Bio:</label>
        <textarea class="form-control" rows="3"></textarea>
      </br>
        </p>
        <input type = "submit" value = "Submit" />
          </form>
        </div></div>
    </div>

  </div>
</div>










</div>
<?php include 'footer.php'; ?>
