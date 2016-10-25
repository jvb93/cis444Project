<?php include 'header.php';?>
<div class="container">
      <h1>Edit Profile</h1>
      <hr>
    <div class="row">
        <!-- left column -->
        <div class="col-md-3">
          <div class="text-center">
            <img class="avatar img-circle" alt="Profile Picture" src="//placehold.it/100">
            <h6>Upload a photo</h6>

            <input class="form-control" type="file">
          </div>
        </div>
        <!-- edit form column -->
<div class= "col-md-offset-3">
          <h3 class = "Personal-info-header" >Personal info</h3><!--having troube centering-->

          <form class="form-horizontal" role="form">
            <div class="form-group">
              <label class="col-lg-3 control-label">First name:</label>
              <div class="col-lg-8">
                <input class="form-control" type="text" value="James">
              </div>
            </div>
            <div class="form-group">
              <label class="col-lg-3 control-label">Last name:</label>
              <div class="col-lg-8">
                <input class="form-control" type="text" value="Garfield">
              </div>
            </div>
            <div class="form-group">
              <label class="col-lg-3 control-label">Restaurant name:</label>
              <div class="col-lg-8">
                <input class="form-control" type="text" value="Panda Garden">
              </div>
            </div>
            <div class="form-group">
              <label class="col-lg-3 control-label">Email:</label>
              <div class="col-lg-8">
                <input class="form-control" type="text" value="Garfieldandfriends@gmail.com">
              </div>
            </div>


            <div class="form-group">
              <label class="col-md-3 control-label">Password:</label>
              <div class="col-md-8">
                <input class="form-control" type="password">
              </div>
            </div>
            <div class="form-group">
              <label class="col-md-3 control-label">Confirm password:</label>
              <div class="col-md-8">
                <input class="form-control" type="password">
              </div>
            </div>

            <div class="form-group">
              <label class="col-md-3 control-label"></label>
              <div class="col-md-8">
                <input class="btn btn-primary" type="button" value="Save Changes">
                <span></span>
                <input class="btn btn-default" type="reset" value="Cancel">
              </div>
            </div>
          </form>
          <div class = " col-md-offset-3 bio-page">
          <p> Bio: </p>
          <textarea cols="50" rows="5" style="overflow:scroll;">

          </textarea>
        </div>


      </div>
        </div>
        <?php include 'footer.php'; ?>
