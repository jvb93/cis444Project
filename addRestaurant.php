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
              <input required type="text" class="form-control" id="restaurantName" aria-describedby="nameHelp" placeholder="Enter restaurant name">
              <small id="nameHelp" class="form-text text-muted">Required.</small>
            </div>
            <div class="form-group">
              <label for="restaurantName">Restaurant Website</label>
              <input required type="url" class="form-control" id="restaurantSite" aria-describedby="urlHelp" placeholder="http://">
              <small id="urlHelp" class="form-text text-muted">Required.</small>
            </div>
            <div class="form-group">
              <label for="restaurantName">Tag</label>
              <input data-role="tagsinput" type="text" class="form-control" id="tag" aria-describedby="tagHelp">
              <small id="tagHelp" class="form-text text-muted">Enter tags seperated by a space</small>
            </div>
            <button type="submit" class="btn btn-primary">Submit</button>
          </form>
        </div>
      </div>
    </div>
  </div>
</div>
<?php include 'footer.php'; ?>
