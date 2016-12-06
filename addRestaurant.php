<?php include 'header.php';?>
<div id ="main">
  <div class="col-md-12">
    <h1>Add Restaurant</h1>
    <div class="row">
      <div class="col-md-12">
        <div class="well">
          <form id = "commentForm" action = "verifyRestaurant.php" method = "post">
            <div class="form-group">
              <label for="restaurantName">Restaurant Name</label>
              <input required type="text" class="form-control" name="restaurantName" id="restaurantName" aria-describedby="nameHelp" placeholder="Enter restaurant name">
              <small id="nameHelp" class="form-text text-muted">Required.</small>
            </div>
            <div class="form-group">
              <label for="restaurantName">Restaurant Website</label>
              <input required type="url" class="form-control" name="restaurantSite" id="restaurantSite"  aria-describedby="urlHelp" placeholder="http://">
              <small id="urlHelp" class="form-text text-muted">Required.</small>
            </div>
            <div class="form-group">
              <label for="restaurantName">Tags</label></br>
              <input type="text" class="form-control" name="tag" id="tag" aria-describedby="tagHelp"></br>
              <small id="tagHelp" class="form-text text-muted">Enter up to 5 tags seperated by spaces</small>
            </div>
            <button type="submit" class="btn btn-primary">Submit</button>
          </form>
        </div>
      </div>
    </div>
  </div>
</div>
<?php include 'footer.php'; ?>
